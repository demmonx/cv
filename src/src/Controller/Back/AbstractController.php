<?php

namespace App\Controller\Back;
use Symfony\Component\Routing\Annotation\Route;

abstract class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    abstract protected function processInput($input) : array;
    abstract protected function setJoinValues($object, $joinItem, $otherItem) : Object;
    abstract protected function setValue($item, $key, $value) : Object;
    abstract protected function getValue($object, $item, $joinRepo) : Object;
    abstract protected function getCurrentValues($object, $em, $joinRepo) : array;

    protected function sync($o, $input, $em, $classes): Object
    {
        // Convert input line to array
        $input = $this->processInput($input);

        // Get the technos associed to this object
        $current = $this->getCurrentValues($o, $em, $this->getDoctrine()->getRepository($classes['dest']));
        
        // List of added values
        $added = [];
        foreach ($input as $k => $v) {
            if (!array_key_exists($k, $current)) {
                $added[$k] = $v;
            }
        }

        // List of removed values
        $removed = [];
        foreach ($current as $k => $v) {
            if (!array_key_exists($k, $input)) {
                $removed[$k] = $v;
            }
        }

        // DBG ONLY
        var_dump($removed);
        var_dump($added);

        // Add new associations, and the value if not exists
        $this->add($o, $added, $classes, $em);

        // Remove old associations
        $this->remove($o, $removed, $classes, $em);

        return $o;
    }

    private function add($object, $list, $classes, $em) {
        $destRepo = $this->getDoctrine()->getRepository($classes['dest']);
        foreach($list as $k => $v) {
            $val = $destRepo->find($k);
            // Value managment
            if ($val != null) { // value exists
                // do nothing
            } else {    // Value must be created
                $val = new $classes['dest']();
                $val = $this->setValue($val, $k, $v);
                $em->persist($val);
                $em->flush();
            }

            // Association managment
            $joinValue = new $classes['join']();
            $joinValue = $this->setJoinValues($object, $joinValue, $val);
            $em->persist($joinValue);
            $em->flush();
        }
    }

    private function remove($object, $list, $classes, $em) {
        $joinRepo = $this->getDoctrine()->getRepository($classes['join']);
        $destRepo = $this->getDoctrine()->getRepository($classes['dest']);
        foreach($list as $k => $v) {
            $item = $destRepo->find($k);
            $em->remove($this->getValue($object, $item, $joinRepo));
            $em->flush();
        }
    }


  
}
