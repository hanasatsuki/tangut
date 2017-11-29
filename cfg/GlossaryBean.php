<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 2017/11/29
 * Time: 下午 03:37
 */

class GlossaryBean
{
    private $russian_serial;
    private $russian;
    private $meaning;
    private $functionword;
    private $transliterate;
    private $unknownword;
    private $propername;
    private $combineword;
    private $notes;
    private $original;

    /**
     * @return mixed
     */
    public function getRussianSerial()
    {
        return $this->russian_serial;
    }

    /**
     * @param mixed $russian_serial
     */
    public function setRussianSerial($russian_serial)
    {
        $this->russian_serial = $russian_serial;
    }

    /**
     * @return mixed
     */
    public function getRussian()
    {
        return $this->russian;
    }

    /**
     * @param mixed $russian
     */
    public function setRussian($russian)
    {
        $this->russian = $russian;
    }

    /**
     * @return mixed
     */
    public function getMeaning()
    {
        return $this->meaning;
    }

    /**
     * @param mixed $meaning
     */
    public function setMeaning($meaning)
    {
        $this->meaning = $meaning;
    }

    /**
     * @return mixed
     */
    public function getFunctionword()
    {
        return $this->functionword;
    }

    /**
     * @param mixed $functionword
     */
    public function setFunctionword($functionword)
    {
        $this->functionword = $functionword;
    }

    /**
     * @return mixed
     */
    public function getTransliterate()
    {
        return $this->transliterate;
    }

    /**
     * @param mixed $transliterate
     */
    public function setTransliterate($transliterate)
    {
        $this->transliterate = $transliterate;
    }

    /**
     * @return mixed
     */
    public function getUnknownword()
    {
        return $this->unknownword;
    }

    /**
     * @param mixed $unknownword
     */
    public function setUnknownword($unknownword)
    {
        $this->unknownword = $unknownword;
    }

    /**
     * @return mixed
     */
    public function getPropername()
    {
        return $this->propername;
    }

    /**
     * @param mixed $propername
     */
    public function setPropername($propername)
    {
        $this->propername = $propername;
    }

    /**
     * @return mixed
     */
    public function getCombineword()
    {
        return $this->combineword;
    }

    /**
     * @param mixed $combineword
     */
    public function setCombineword($combineword)
    {
        $this->combineword = $combineword;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * @param mixed $original
     */
    public function setOriginal($original)
    {
        $this->original = $original;
    }


}