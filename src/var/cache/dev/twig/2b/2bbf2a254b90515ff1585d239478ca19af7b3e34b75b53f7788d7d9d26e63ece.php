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

/* layout/body.html.twig */
class __TwigTemplate_3b5ef5e7a7f5df15c018c91eb5de35319fe5d97ffd086c8b138950eeec2bb131 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout/body.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout/body.html.twig"));

        // line 1
        echo "        \t\t<div id=\"featured\">
\t\t\t<div class=\"container\">
\t\t\t\t<header>
\t\t\t\t\t<h2>Welcome to Linear</h2>
\t\t\t\t</header>
\t\t\t\t<p>This is <strong>Linear</strong>, a responsive HTML5 site template freebie by <a href=\"http://templated.co\">TEMPLATED</a>. Released for free under the <a href=\"http://templated.co/license\">Creative Commons Attribution</a> license, so use it for whatever (personal or commercial) &ndash; just give us credit! Check out more of our stuff at <a href=\"http://templated.co\">our site</a> or follow us on <a href=\"http://twitter.com/templatedco\">Twitter</a>.</p>
\t\t\t\t<hr />
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<section class=\"4u\">
\t\t\t\t\t\t<span class=\"pennant\"><span class=\"fa fa-briefcase\"></span></span>
\t\t\t\t\t\t<h3>Maecenas luctus lectus</h3>
\t\t\t\t\t\t<p>Curabitur sit amet nulla. Nam in massa. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac leo.</p>
\t\t\t\t\t\t<a href=\"#\" class=\"button button-style1\">Read More</a>
\t\t\t\t\t</section>
\t\t\t\t\t<section class=\"4u\">
\t\t\t\t\t\t<span class=\"pennant\"><span class=\"fa fa-lock\"></span></span>
\t\t\t\t\t\t<h3>Maecenas luctus lectus</h3>
\t\t\t\t\t\t<p>Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec magna.</p>
\t\t\t\t\t\t<a href=\"#\" class=\"button button-style1\">Read More</a>
\t\t\t\t\t</section>
\t\t\t\t\t<section class=\"4u\">
\t\t\t\t\t\t<span class=\"pennant\"><span class=\"fa fa-globe\"></span></span>
\t\t\t\t\t\t<h3>Maecenas luctus lectus</h3>
\t\t\t\t\t\t<p>Curabitur sit amet nulla. Nam in massa. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac leo.</p>
\t\t\t\t\t\t<a href=\"#\" class=\"button button-style1\">Read More</a>
\t\t\t\t\t</section>

\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t<!-- Main -->
\t\t<div id=\"main\">
\t\t\t<div id=\"content\" class=\"container\">

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<section class=\"6u\">
\t\t\t\t\t\t<a href=\"#\" class=\"image full\"><img src=\"images/pic01.jpg\" alt=\"\"></a>
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Mauris vulputate dolor</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
\t\t\t\t\t</section>\t\t\t\t
\t\t\t\t\t<section class=\"6u\">
\t\t\t\t\t\t<a href=\"#\" class=\"image full\"><img src=\"images/pic02.jpg\" alt=\"\"></a>
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Mauris vulputate dolor</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
\t\t\t\t\t</section>\t\t\t\t
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<section class=\"6u\">
\t\t\t\t\t\t<a href=\"#\" class=\"image full\"><img src=\"images/pic03.jpg\" alt=\"\"></a>
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Mauris vulputate dolor</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
\t\t\t\t\t</section>\t\t\t\t
\t\t\t\t\t<section class=\"6u\">
\t\t\t\t\t\t<a href=\"#\" class=\"image full\"><img src=\"images/pic04.jpg\" alt=\"\"></a>
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Mauris vulputate dolor</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
\t\t\t\t\t</section>\t\t\t\t
\t\t\t\t</div>
\t\t\t
\t\t\t</div>
\t\t</div>

\t<!-- Tweet -->
\t\t<div id=\"tweet\">
\t\t\t<div class=\"container\">
\t\t\t\t<section>
\t\t\t\t\t<blockquote>&ldquo;";
        // line 77
        $this->displayBlock('body', $context, $blocks);
        echo "&rdquo;</blockquote>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>
\t\t
        ";
        // line 82
        $this->displayBlock('javascripts', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 77
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 82
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "layout/body.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  159 => 82,  141 => 77,  131 => 82,  123 => 77,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("        \t\t<div id=\"featured\">
\t\t\t<div class=\"container\">
\t\t\t\t<header>
\t\t\t\t\t<h2>Welcome to Linear</h2>
\t\t\t\t</header>
\t\t\t\t<p>This is <strong>Linear</strong>, a responsive HTML5 site template freebie by <a href=\"http://templated.co\">TEMPLATED</a>. Released for free under the <a href=\"http://templated.co/license\">Creative Commons Attribution</a> license, so use it for whatever (personal or commercial) &ndash; just give us credit! Check out more of our stuff at <a href=\"http://templated.co\">our site</a> or follow us on <a href=\"http://twitter.com/templatedco\">Twitter</a>.</p>
\t\t\t\t<hr />
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<section class=\"4u\">
\t\t\t\t\t\t<span class=\"pennant\"><span class=\"fa fa-briefcase\"></span></span>
\t\t\t\t\t\t<h3>Maecenas luctus lectus</h3>
\t\t\t\t\t\t<p>Curabitur sit amet nulla. Nam in massa. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac leo.</p>
\t\t\t\t\t\t<a href=\"#\" class=\"button button-style1\">Read More</a>
\t\t\t\t\t</section>
\t\t\t\t\t<section class=\"4u\">
\t\t\t\t\t\t<span class=\"pennant\"><span class=\"fa fa-lock\"></span></span>
\t\t\t\t\t\t<h3>Maecenas luctus lectus</h3>
\t\t\t\t\t\t<p>Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec magna.</p>
\t\t\t\t\t\t<a href=\"#\" class=\"button button-style1\">Read More</a>
\t\t\t\t\t</section>
\t\t\t\t\t<section class=\"4u\">
\t\t\t\t\t\t<span class=\"pennant\"><span class=\"fa fa-globe\"></span></span>
\t\t\t\t\t\t<h3>Maecenas luctus lectus</h3>
\t\t\t\t\t\t<p>Curabitur sit amet nulla. Nam in massa. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac leo.</p>
\t\t\t\t\t\t<a href=\"#\" class=\"button button-style1\">Read More</a>
\t\t\t\t\t</section>

\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t<!-- Main -->
\t\t<div id=\"main\">
\t\t\t<div id=\"content\" class=\"container\">

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<section class=\"6u\">
\t\t\t\t\t\t<a href=\"#\" class=\"image full\"><img src=\"images/pic01.jpg\" alt=\"\"></a>
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Mauris vulputate dolor</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
\t\t\t\t\t</section>\t\t\t\t
\t\t\t\t\t<section class=\"6u\">
\t\t\t\t\t\t<a href=\"#\" class=\"image full\"><img src=\"images/pic02.jpg\" alt=\"\"></a>
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Mauris vulputate dolor</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
\t\t\t\t\t</section>\t\t\t\t
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<section class=\"6u\">
\t\t\t\t\t\t<a href=\"#\" class=\"image full\"><img src=\"images/pic03.jpg\" alt=\"\"></a>
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Mauris vulputate dolor</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
\t\t\t\t\t</section>\t\t\t\t
\t\t\t\t\t<section class=\"6u\">
\t\t\t\t\t\t<a href=\"#\" class=\"image full\"><img src=\"images/pic04.jpg\" alt=\"\"></a>
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Mauris vulputate dolor</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
\t\t\t\t\t</section>\t\t\t\t
\t\t\t\t</div>
\t\t\t
\t\t\t</div>
\t\t</div>

\t<!-- Tweet -->
\t\t<div id=\"tweet\">
\t\t\t<div class=\"container\">
\t\t\t\t<section>
\t\t\t\t\t<blockquote>&ldquo;{% block body %}{% endblock %}&rdquo;</blockquote>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>
\t\t
        {% block javascripts %}{% endblock %}
", "layout/body.html.twig", "/var/www/templates/layout/body.html.twig");
    }
}
