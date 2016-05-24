<?php

namespace Praspel\tests\units;

use mageekguy\atoum;

class Example extends atoum\test
{
    public function testA()
    {
        $this->boolean(true);

        $int = $this->realdom->boundinteger(0);
        $integers = $this->sampleMany($int, 1024);

        foreach ($integers as $i) {
            $this->integer($i)->isGreaterThan(0);
        }
    }

    public function testJsonGrammar()
    {
        $json = $this->realdom->grammar(__DIR__ . DS . 'JsonGrammar.pp');

        foreach($this->sampleMany($json, 10) as $json) {

            json_decode($json);

            $this->integer(json_last_error())
                 ->isEqualTo(JSON_ERROR_NONE);
        }
    }

    public function testJsonExhaustively()
    {
        $compiler = \Hoa\Compiler\Llk\Llk::load(new \Hoa\File\Read(__DIR__ . DS .  'JsonGrammar.pp'));
        $sampler  = new \Hoa\Compiler\Llk\Sampler\BoundedExhaustive(
            $compiler,
            new \Hoa\Regex\Visitor\Isotropic(new \Hoa\Math\Sampler\Random()),
            5
        );
        $visitor  = new \Hoa\Math\Visitor\Arithmetic();

        foreach($sampler as $json) {

            json_decode($json);

            $this->integer(json_last_error())
                 ->isEqualTo(JSON_ERROR_NONE);
        }
    }

    public function BProvider()
    {
        return $this->sample($this->realdom->boundInteger(0, 2000));
    }

    /**
     * @dataProvider BProvider
     */
    public function testB($data)
    {
        $this->integer($data);
    }
}
