<?php

namespace Service;

use Exception as Exception;
use Twig\Environment as TwigEnvironment;
use Twig\Loader\FilesystemLoader as TwigFilesystemLoader;
use Twig\TemplateWrapper;

final class TwigTemplateManager
{
    const TEMPLATES_PATH = 'src\templates\mail';

    private TwigFilesystemLoader $filesystemLoader;
    private TwigEnvironment $environment;
    private string $templateFile;
    private array $templateValues;
    private TemplateWrapper $template;

    public function __construct(string $templateFile, array $templateValues = [])
    {
        $this->setTemplateFile($templateFile)
            ->setTemplateValues($templateValues);
    }

    public function getRender()
    {
        //try {
            $this->loadTemplate();
            if($template = $this->getTemplate()) {
                return $template->render($this->getTemplateValues());
            }          
        /*
        } catch (Exception) {
            echo "Error : rendering template \"{$this->getTemplateFile()}\"";
        }
        */
        
    }

    public function display() {
        echo $this->getRender();
    }

    private function loadTemplate()
    {
        //try {
            // todo : checker fichier exist
            if($twig = $this->getEnvironment()){
                $this->setTemplate($twig->load($this->getTemplateFile()));
            }
        /*
        } catch (Exception) {
            echo "Error : loading template \"{$this->getTemplateFile()}\"";
        }
        */
    }

    private function getFilesystemLoader(): TwigFilesystemLoader
    {
        if (empty($this->filesystemLoader)) {
            $this->filesystemLoader = new TwigFilesystemLoader(self::TEMPLATES_PATH);
        }

        return $this->filesystemLoader;
    }

    private function getEnvironment(): TwigEnvironment
    {
        if (empty($this->environment)) {
            $this->environment = new TwigEnvironment($this->getFilesystemLoader());
        }

        return $this->environment;
    }

    private function getTemplateFile(): string
    {
        return $this->templateFile;
    }

    private function setTemplateFile(string $templateFile): self
    {
        $this->templateFile = $templateFile;

        return $this;
    }

    private function getTemplateValues(): array
    {
        return $this->templateValues;
    }

    private function setTemplateValues(array $templateValues): self
    {
        $this->templateValues = $templateValues;

        return $this;
    }

    private function getTemplate(): TemplateWrapper
    {
        return $this->template;
    }

    private function setTemplate(TemplateWrapper $template): self
    {
        $this->template = $template;

        return $this;
    }
}
