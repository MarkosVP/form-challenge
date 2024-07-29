<?php

namespace App\Components\Dom;

/**
 * An DOM Element to be converted an inserted inside a Page. Contains a HTML and can contain CSS and JS scripts
 */
class Element {
    /**
     * The HTML as a string to be added on the DOM
     *
     * @var string
     */
    protected string $html;

    /**
     * The CSS as a string to be added to the DOM
     *
     * @var string
     */
    protected string $css;

    /**
     * The javascript as a string to be added on the DOM
     *
     * @var string
     */
    protected string $javascript;

    /**
     * Build a new Page Element
     *
     * @param string $html The HTML as a string
     * @param string $css The CSS as a string
     * @param string $javascript The javascript as a string
     */
    public function __construct(string $html, string $css = '', string $javascript = '')
    {
        $this->html = $html;
        $this->css = $css;
        $this->javascript = $javascript;
    }

    /**
     * Get the current HTML for this Element
     *
     * @return string
     */
    public function getHTML(): string
    {
        return $this->html;
    }

    /**
     * Set the HTML for this Element
     *
     * @param string $html The HTML as a string to update the Element
     */
    public function setHTML(string $html): void
    {
        $this->html = $html;
    }

    /**
     * Get the current CSS for this Element
     *
     * @return string
     */
    public function getCss(): string
    {
        return $this->css;
    }

    /**
     * Set the CSS for this Element
     *
     * @param string $css The CSS as a string to update the Element
     */
    public function setCSS(string $css): void
    {
        $this->css = $css;
    }

    /**
     * Get the current Javascript for this Element
     *
     * @return string
     */
    public function getScript(): string
    {
        return $this->javascript;
    }

    /**
     * Set the CSS for this Element
     *
     * @param string $javascript The Javascript as a string to update the Element
     */
    public function setJavascript(string $javascript): void
    {
        $this->javascript = $javascript;
    }
}