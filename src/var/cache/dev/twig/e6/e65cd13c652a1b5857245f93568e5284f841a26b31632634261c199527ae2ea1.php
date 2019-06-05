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
class __TwigTemplate_78fc03d0e1b3e1df61ecdc3d2dd56ed2ecd44a43782889b3bc4c13881a3d34d1 extends \Twig\Template
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
\t\t\t<li><a href=\"";
        // line 5
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage");
        echo "\">";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("A propos", [], "messages");
        echo "</a></li>
\t\t\t<li><a href=\"";
        // line 6
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("projets");
        echo "\">";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Projets", [], "messages");
        echo "</a></li>
\t\t\t<li><a href=\"";
        // line 7
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("exp");
        echo "\">";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Expériences", [], "messages");
        echo "</a></li>
\t\t\t<li><a href=\"";
        // line 8
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cv");
        echo "\">";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("CV", [], "messages");
        echo "</a></li>
\t\t</ul>\t
\t\t
\t\t<ul class='language_selector'>
\t\t\t<li class='test'><a href=\"";
        // line 12
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("switch_language", ["locale" => "fr"]);
        echo "\">FR</a></li>
\t\t\t<li><a href=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("switch_language", ["locale" => "en"]);
        echo "\">EN</a></li>
\t\t</ul>

\t</nav>
</div>
<div class=\"container\"> 
\t
\t<!-- Logo -->
\t<div id=\"logo\">
\t\t<h1><a href='";
        // line 22
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage");
        echo "'>";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Administrateur Système", [], "messages");
        echo " <span class=\"tag\"> - Cyril Démery</span></a></h1>
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

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 22,  80 => 13,  76 => 12,  67 => 8,  61 => 7,  55 => 6,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"nav-wrapper\"> 
\t<!-- Nav -->
\t<nav id=\"nav\">
\t\t<ul>
\t\t\t<li><a href=\"{{path('homepage')}}\">{% trans %}A propos{% endtrans %}</a></li>
\t\t\t<li><a href=\"{{path('projets')}}\">{% trans %}Projets{% endtrans %}</a></li>
\t\t\t<li><a href=\"{{path('exp')}}\">{% trans %}Expériences{% endtrans %}</a></li>
\t\t\t<li><a href=\"{{path('cv')}}\">{% trans %}CV{% endtrans %}</a></li>
\t\t</ul>\t
\t\t
\t\t<ul class='language_selector'>
\t\t\t<li class='test'><a href=\"{{path('switch_language', {'locale':'fr'}) }}\">FR</a></li>
\t\t\t<li><a href=\"{{path('switch_language', {'locale':'en'}) }}\">EN</a></li>
\t\t</ul>

\t</nav>
</div>
<div class=\"container\"> 
\t
\t<!-- Logo -->
\t<div id=\"logo\">
\t\t<h1><a href='{{path('homepage')}}'>{% trans %}Administrateur Système{% endtrans %} <span class=\"tag\"> - Cyril Démery</span></a></h1>
\t\t<span class=\"tag\">Cyril Démery</span>
\t</div>
</div>
", "layout/navbar.html.twig", "/var/www/templates/layout/navbar.html.twig");
    }
}
