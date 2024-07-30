<?php

namespace App\Components\Dom;

class Page
{
    /**
     * The Page Elements in HTML
     *
     * @var string[]
     */
    protected array $elements = [];

    /**
     * The Page Styles in HTML
     *
     * @var string[]
     */
    protected array $styles = [];

    /**
     * The Page scripts in javascript
     *
     * @var string[]
     */
    protected array $scripts = [];

    /**
     * The Page Title to be showed on the navigator
     *
     * @var string
     */
    protected string $pageTitle;

    /**
     * Creates a new DOM Page
     *
     * @param string $title The Title of the Page
     */
    public function __construct(string $title = 'Untitled')
    {
        $this->pageTitle = $title;
    }

    /**
     * Adds an Page Element on the page
     *
     * @param Element $element The Page ELement to be added
     * @return void
     */
    public function addPageElement(Element $element): void
    {
        // Add the data inside the Page array
        $this->elements[] = $element->getHTML();
        $this->styles[] = $element->getCss();
        $this->scripts[] = $element->getScript();
    }

    /**
     * Convert the Elements, CSS and Script arrays into an string with a complete HTML with the page
     *
     * @return string The HTML of the current generated page
     */
    public function render(): string
    {
        // Creates the initial structure for the page
        $pageHTML = "<!DOCTYPE html><html>";

        // Add the initial Head data
        $head = "<head><title>$this->pageTitle</title>";

        // Add all CSS inside a Style tag if any exists
        $head .= "<style type='text/css'> html {
                display: flex;
                height: 100%;
            }

            body {
                display: flex;
                flex-direction: column;
                align-content: center;
                justify-content: center;
                flex-wrap: wrap;
                margin: 0;
                flex-grow: 1;
                background-color: #E4E4E4;
                font-family: arial;
        }";

        foreach ($this->styles as $css) {
            $head .= $css;
        }

        $head .= "</style>";

        // Add the head on the page
        $pageHTML .= $head . '</head>';

        // Declare the Body
        $body = "<body>";

        // Add all elements to the body
        foreach ($this->elements as $domEl) {
            $body .= "<div>$domEl</div>";
        }

        // Add all scriot to the body if any exists
        if (!empty($this->scripts)) {
            $scripts = "<script>";

            foreach ($this->scripts as $js) {
                $scripts .= $js;
            }

            $scripts .= "</script>";
        }

        // Add the head on the page
        $pageHTML .= $body . "<noscript>Sorry, your browser does not support JavaScript!</noscript></body>";

        // Wraps the HTML and return the page
        return $pageHTML . '</html>';
    }
}
