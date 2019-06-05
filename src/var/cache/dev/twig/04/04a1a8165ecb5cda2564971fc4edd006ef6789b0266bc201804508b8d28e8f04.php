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

/* layout/navbar.html.twig */
class __TwigTemplate_0915d8e782f38aee69af4118ffb02f6cd57f162bd73b9d419b37c28fdb760662 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout/navbar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout/navbar.html.twig"));

        // line 1
        echo "<div id=\"nav-wrapper\"> 
\t<!-- Nav -->
\t<nav id=\"nav\">
\t\t<ul>
\t\t\t<li class=\"active\"><a href=\"index.html\">A propos</a></li>
\t\t\t<li><a href=\"left-sidebar.html\">Projets</a></li>
\t\t\t<li><a href=\"right-sidebar.html\">Expériences</a></li>
\t\t\t<li><a href=\"right-sidebar.html\">CV</a></li>
\t\t\t<li><a href=\"no-sidebar.html\">Contact</a></li>
\t\t</ul>
\t</nav>
</div>
<div class=\"container\"> 
\t
\t<!-- Logo -->
\t<div id=\"logo\">
\t\t<h1><a href=\"#\">Administrateur systèmes</a></h1>
\t\t<span class=\"tag\">Cyril Démery</span>
\t</div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "layout/navbar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"nav-wrapper\"> 
\t<!-- Nav -->
\t<nav id=\"nav\">
\t\t<ul>
\t\t\t<li class=\"active\"><a href=\"index.html\">A propos</a></li>
\t\t\t<li><a href=\"left-sidebar.html\">Projets</a></li>
\t\t\t<li><a href=\"right-sidebar.html\">Expériences</a></li>
\t\t\t<li><a href=\"right-sidebar.html\">CV</a></li>
\t\t\t<li><a href=\"no-sidebar.html\">Contact</a></li>
\t\t</ul>
\t</nav>
</div>
<div class=\"container\"> 
\t
\t<!-- Logo -->
\t<div id=\"logo\">
\t\t<h1><a href=\"#\">Administrateur systèmes</a></h1>
\t\t<span class=\"tag\">Cyril Démery</span>
\t</div>
</div>
", "layout/navbar.html.twig", "/var/www/templates/layout/navbar.html.twig");
    }
}
