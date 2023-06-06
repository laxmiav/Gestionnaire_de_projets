<?php

namespace App\Form;

use App\Entity\Tasks;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Projets;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TasksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class)
            ->add('Description',TextareaType :: class)
            ->add('Deadline_date',DateType::class)
            ->add('Priority',ChoiceType::class,[
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
                'required'=>false
            ])
            ->add('Status',ChoiceType::class,[
                'choices'  => [
                    'TODO' => '1',
                    'Progress' => '2',
                    'Pending' => '3',
                    'Complete' => '4',
                ],
                'required'=>false
            ])
            ->add('Project',EntityType ::class ,[  
                'class' => Projets::class,
                'choice_label' => 'name',
                'multiple'=>false,
                'expanded'=>false,
                
                
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tasks::class,
        ]);
    }
}
