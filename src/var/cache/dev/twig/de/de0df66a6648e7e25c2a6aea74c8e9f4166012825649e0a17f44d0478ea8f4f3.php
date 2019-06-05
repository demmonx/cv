<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout/footer.html.twig */
class __TwigTemplate_6960ced61ed72a57b29bdc6dde585153fa22340428ffeb3bff558d80bcf5f600 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout/footer.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout/footer.html.twig"));

        // line 1
        echo "
\t\t\t<div class=\"container\">
\t\t\t\t<section>
\t\t\t\t\t<header>
\t\t\t\t\t\t<h2>Get in touch</h2>
\t\t\t\t\t\t<span class=\"byline\">Integer sit amet pede vel arcu aliquet pretium</span>
\t\t\t\t\t</header>
\t\t\t\t\t<ul class=\"contact\">
\t\t\t\t\t\t<li><a href=\"#\" class=\"fa fa-linkedin\"><span>Linkedin</span></a></li>
\t\t\t\t\t\t<li><a href=\"#\" class=\"fa fa-facebook\"><span>Facebook</span></a></li>
\t\t\t\t\t\t<li><a href=\"#\" class=\"fa fa-instagram\"><span>Instagram</span></a></li>
\t\t\t\t\t\t<li><a href=\"#\" class=\"fa fa-youtube\"><span>Youtube</span></a></li>
\t\t\t\t\t</ul>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>

\t<!-- Copyright -->
\t\t<div id=\"copyright\">
\t\t\t<div class=\"container\">
\t\t\t\tCyril Démery ~ 2019
\t\t\t\t
\t\t\t</div>
\t\t</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "layout/footer.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
\t\t\t<div class=\"container\">
\t\t\t\t<section>
\t\t\t\t\t<header>
\t\t\t\t\t\t<h2>Get in touch</h2>
\t\t\t\t\t\t<span class=\"byline\">Integer sit amet pede vel arcu aliquet pretium</span>
\t\t\t\t\t</header>
\t\t\t\t\t<ul class=\"contact\">
\t\t\t\t\t\t<li><a href=\"#\" class=\"fa fa-linkedin\"><span>Linkedin</span></a></li>
\t\t\t\t\t\t<li><a href=\"#\" class=\"fa fa-facebook\"><span>Facebook</span></a></li>
\t\t\t\t\t\t<li><a href=\"#\" class=\"fa fa-instagram\"><span>Instagram</span></a></li>
\t\t\t\t\t\t<li><a href=\"#\" class=\"fa fa-youtube\"><span>Youtube</span></a></li>
\t\t\t\t\t</ul>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>

\t<!-- Copyright -->
\t\t<div id=\"copyright\">
\t\t\t<div class=\"container\">
\t\t\t\tCyril Démery ~ 2019
\t\t\t\t
\t\t\t</div>
\t\t</div>
", "layout/footer.html.twig", "/var/www/templates/layout/footer.html.twig");
    }
}
