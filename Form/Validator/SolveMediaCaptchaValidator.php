<?php

namespace Hispavista\SolveMediaBundle\Form\Validator;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Exception\InvalidConfigurationException;
use Symfony\Component\HttpFoundation\Request;
use Hispavista\SolveMediaBundle\Model\SolveMediaClient;

/**
 * SolveMediaCaptchaValidator
 *
 * @author rubenma
 */
class SolveMediaCaptchaValidator implements EventSubscriberInterface {

    private $request;
    private $privateKey;
    private $hashKey;
    private $translator;

    /**
     * @param Request $request
     * @param string $privateKey
     */
    public function __construct(Request $request, $privateKey, $hashKey, $translator) {
        $this->request = $request;
        $this->privateKey = $privateKey;
        $this->hashKey = $hashKey;
        $this->translator= $translator;
    }

    public function validate(FormEvent $event) {
        $form = $event->getForm();
        $error = '';
        $request = $this->request->request;
        $datas = array(
            'challenge' => $request->get('adcopy_challenge'),
            'response' => $request->get('adcopy_response'),
            'remoteip' => $this->request->getClientIp()
        );
        
        if (empty($datas['challenge']) || empty($datas['response'])) {
            $answer=new \Hispavista\SolveMediaBundle\Model\SolveMediaResponse;
            $answer->setError('hispavista.solve_media.invalid_captcha');
            $answer->setIs_valid(false);
        } else  {
            $answer = $this->check($datas);
        }
        
        if (!$answer->getIs_valid()) {
            $form->addError(new FormError($this->translator->trans($answer->getError(), array(), 'validation')));
        }
    }

    public static function getSubscribedEvents() {
        return array(FormEvents::POST_BIND => 'validate');
    }

    private function check($data){
        $client=new SolveMediaClient();
        return $client->solvemedia_check_answer(
            $this->privateKey,
            $data['remoteip'],
            $data['challenge'],
            $data['response'],
            $this->hashKey
        );
    }
}
