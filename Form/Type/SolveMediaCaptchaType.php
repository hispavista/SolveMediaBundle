<?php

namespace Hispavista\SolveMediaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of SolveMediaType
 *
 * @author rubenma
 */
class SolveMediaCaptchaType extends AbstractType {

    private $challengeKey;
    private $validator;

    public function __construct($challengeKey, EventSubscriberInterface $validator) {
        $this->challengeKey = $challengeKey;
        $this->validator = $validator;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'config' => array('theme'=>'white', 'lang'=>'en'),
            'validator' => array(),
            'error_bubbling' => false,
        ))
        ->setAllowedTypes(array(
            'config' => 'array',
            'validator' => 'array',
        ));
    }

    public function getName() {
        return 'hispavista_solvemediacaptcha';
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars = array_replace($view->vars, array(
            'challengeKey' => $this->challengeKey,
            'config' => $options['config'],
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->addEventSubscriber($this->validator);
    }

}
