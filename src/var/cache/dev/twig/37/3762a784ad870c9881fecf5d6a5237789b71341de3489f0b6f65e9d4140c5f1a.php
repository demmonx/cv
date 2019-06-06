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

/* en/cv.html.twig */
class __TwigTemplate_e5fa37a3ee7a46289adf6188fce1040f0f0d780a6c3bf5f55198186747dcfb24 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "en/cv.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "en/cv.html.twig"));

        $this->parent = $this->loadTemplate("layout/base.html.twig", "en/cv.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Resume";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "\t<link href='";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/w3.css"), "html", null, true);
        echo "' rel='stylesheet' type='text/css'>
\t<link href='";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/font-awesome.min.css"), "html", null, true);
        echo "' rel='stylesheet' type='text/css'>
\t<link href='";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/cv.css"), "html", null, true);
        echo "' rel='stylesheet' type='text/css'>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "  <!-- The Grid -->
  <div class=\"w3-row-padding\">
  
    <!-- Left Column -->
    <div class=\"w3-third\">
    
      <div class=\"w3-white w3-text-grey w3-card-4\">
        <div class=\"w3-container\">
\t\t  <p class=\"w3-large w3-text-theme first-item\"><b><i class=\"fa fa-user fa-fw w3-margin-right w3-text-teal\"></i>Cyril Démery</b></p>
          <p><i class=\"fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal\"></i>System Administrator</p>
          <p><i class=\"fa fa-home fa-fw w3-margin-right w3-large w3-text-teal\"></i>Toulouse, France</p>
          <p><i class=\"fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal\"></i>cyril.demery.pro@gmail.com</p>
          <p><i class=\"fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal\"></i>+33 6 72 68 75 43</p>
          <hr>

          <p class=\"w3-large\"><b><i class=\"fa fa-asterisk fa-fw w3-margin-right w3-text-teal\"></i>Skills</b></p>
          <p>PHP, jQuery, CSS, HMTL</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:90%\">
              <div class=\"w3-center w3-text-white\">90%</div>
            </div>
          </div>
          <p>Java</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:80%\">80%</div>
          </div>
          <p>Bash</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:65%\">60%</div>
          </div>
          <p>C</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:60%\">60%</div>
          </div>
          <p>Python</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:30%\">30%</div>
          </div>
          <p>Android</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:30%\">30%</div>
          </div>
          <br>
          
          <p class=\"w3-large\"><b><i class=\"fa fa-users fa-fw 
          w3-margin-right w3-text-teal\"></i>Soft Skills</b></p>
          <p><i class=\"fa fa fa-asterisk fa-fw w3-tiny w3-margin-right 
          w3-text-teal\"></i> Curious</p>
          <p><i class=\"fa fa fa-asterisk fa-fw w3-tiny w3-margin-right 
          w3-text-teal\"></i> Organized</p>
          <p><i class=\"fa fa fa-asterisk fa-fw w3-tiny w3-margin-right 
          w3-text-teal\"></i> Autonomous</p>
          <p><i class=\"fa fa fa-asterisk fa-fw w3-tiny w3-margin-right 
          w3-text-teal\"></i> Team player</p>

          <p class=\"w3-large w3-text-theme\"><b><i class=\"fa fa-globe fa-fw w3-margin-right w3-text-teal\"></i>Languages</b></p>
          <p>French</p>
          <div class=\"w3-light-grey w3-round-xlarge\">
            <div class=\"w3-round-xlarge w3-teal\" style=\"height:24px;width:100%\"></div>
          </div>
          <p>English (TOEIC 920)</p>
          <div class=\"w3-light-grey w3-round-xlarge\">
            <div class=\"w3-round-xlarge w3-teal\" style=\"height:24px;width:70%\"></div>
          </div>
          <p>Spanish</p>
          <div class=\"w3-light-grey w3-round-xlarge\">
            <div class=\"w3-round-xlarge w3-teal\" style=\"height:24px;width:35%\"></div>
          </div>
          <br>
          
          <p class=\"w3-large\"><b><i class=\"fa fa-question fa-fw w3-margin-right w3-text-teal\"></i>Others</b></p>
          <p><i class=\"fa fa-address-card fa-fw w3-margin-right 
          w3-text-teal\"></i> Driver licence</p>
          <p><i class=\"fa fa-car fa-fw w3-margin-right w3-text-teal\"></i> Personnal car</p>
          
          
        </div>
      </div><br>
      
      

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class=\"w3-twothird\">
    
      <div class=\"w3-container w3-card w3-white w3-margin-bottom\">
        <h2 class=\"w3-text-grey w3-padding-10\"><i class=\"fa fa-suitcase fa-fw w3-margin-right w3-xlarge w3-text-teal\"></i>Experiences</h2>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>System Administrator</b> - <i>SII, Toulouse, France (internship)</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Mar 2019 - <span class=\"w3-tag w3-teal w3-round\">Current</span></h6>
          <p>System development to auto-deploy and configure complicated infrastructure
based on an user friendly config file describing all the servers and their config</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Web Developer (Symfony)</b> - <i>Check Your Smile, Toulouse, France (School project)</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Jan 2019 - Mar 2019</h6>
          <p>Design, development and implementation of new modules, troubleshooting
existing parts of the website</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Big Data Analyst</b> - <i>SUPSI, Manno, Switzerland (internship)</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Jun 2017 - Jul 2017</h6>
          <p>Analysis of user behavior based on theirs socials networks and cell phones
data with Python</p>
\t\t\t<hr>
        </div>
        <div class=\"w3-container\">
           <h5 class=\"w3-opacity\"><b>Technician</b> - <i>IT Center, Soual, France (internship)</i></h5>
           <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Jul 2017 - Aug 2017</h6>
           <p>Troubleshooting desktops and laptops for professionals and individuals, Com-
puting hardware sales</p>
\t\t\t<hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Web Developer (Laravel)</b> - <i>Strategies Web International, Quebec, Canada (internship)</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Mar 2016 - Jun 2016</h6>
          <p>Web portal designing, Server configuration (web server, database, mail ser-
vices, security, git)</p>
        </div>
      </div>

      <div class=\"w3-container w3-card w3-white\">
        <h2 class=\"w3-text-grey w3-padding-10\"><i class=\"fa fa-certificate fa-fw w3-margin-right w3-xlarge w3-text-teal\"></i>Education</h2>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Master's Degree in Computer Engineering</b> - <i>ENSEEIHT, Toulouse, France</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>2016 - 2019</h6>
          <p>Matematics, Programming, Systems, Networks</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Computing HND (DUT in France)</b> - <i>Technolgy Insitute, Rodez, France</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>2014 - 2016</h6>
          <p>Matematics, Programming, Systems, Networks</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>\"A\" levels focused on Sciences</b> - <i>High School Borde Basse, Castres, France</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>2014</h6>
          <p>With Honours <br />
\t\t\tMatematics, Physics, Engeneering Sciences
\t\t</p><br>
        </div>
      </div>
      
      <div class=\"w3-container w3-card w3-white\">
        <h2 class=\"w3-text-grey w3-padding-10\"><i class=\"fa fa-television fa-fw w3-margin-right w3-xlarge w3-text-teal\"></i>Hobbies</h2>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Mountain Bike</b></h5>
          <p>Trails construction and maintenance, riding every week-end, racing few times per years in
regional and national races, doing mechanics</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Travel</b></h5>
          <p>Discover new places, travel few times during my studies (internship in Quebec and Switzer-
land), visiting new countries and cities</p>
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "en/cv.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 12,  110 => 11,  98 => 8,  94 => 7,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}

{% block title %}Resume{% endblock %}

{% block stylesheets %}
\t<link href='{{asset('css/w3.css') }}' rel='stylesheet' type='text/css'>
\t<link href='{{asset('css/font-awesome.min.css') }}' rel='stylesheet' type='text/css'>
\t<link href='{{asset('css/cv.css') }}' rel='stylesheet' type='text/css'>
{% endblock %}

{% block body %}
  <!-- The Grid -->
  <div class=\"w3-row-padding\">
  
    <!-- Left Column -->
    <div class=\"w3-third\">
    
      <div class=\"w3-white w3-text-grey w3-card-4\">
        <div class=\"w3-container\">
\t\t  <p class=\"w3-large w3-text-theme first-item\"><b><i class=\"fa fa-user fa-fw w3-margin-right w3-text-teal\"></i>Cyril Démery</b></p>
          <p><i class=\"fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal\"></i>System Administrator</p>
          <p><i class=\"fa fa-home fa-fw w3-margin-right w3-large w3-text-teal\"></i>Toulouse, France</p>
          <p><i class=\"fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal\"></i>cyril.demery.pro@gmail.com</p>
          <p><i class=\"fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal\"></i>+33 6 72 68 75 43</p>
          <hr>

          <p class=\"w3-large\"><b><i class=\"fa fa-asterisk fa-fw w3-margin-right w3-text-teal\"></i>Skills</b></p>
          <p>PHP, jQuery, CSS, HMTL</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:90%\">
              <div class=\"w3-center w3-text-white\">90%</div>
            </div>
          </div>
          <p>Java</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:80%\">80%</div>
          </div>
          <p>Bash</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:65%\">60%</div>
          </div>
          <p>C</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:60%\">60%</div>
          </div>
          <p>Python</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:30%\">30%</div>
          </div>
          <p>Android</p>
          <div class=\"w3-light-grey w3-round-xlarge w3-small\">
            <div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:30%\">30%</div>
          </div>
          <br>
          
          <p class=\"w3-large\"><b><i class=\"fa fa-users fa-fw 
          w3-margin-right w3-text-teal\"></i>Soft Skills</b></p>
          <p><i class=\"fa fa fa-asterisk fa-fw w3-tiny w3-margin-right 
          w3-text-teal\"></i> Curious</p>
          <p><i class=\"fa fa fa-asterisk fa-fw w3-tiny w3-margin-right 
          w3-text-teal\"></i> Organized</p>
          <p><i class=\"fa fa fa-asterisk fa-fw w3-tiny w3-margin-right 
          w3-text-teal\"></i> Autonomous</p>
          <p><i class=\"fa fa fa-asterisk fa-fw w3-tiny w3-margin-right 
          w3-text-teal\"></i> Team player</p>

          <p class=\"w3-large w3-text-theme\"><b><i class=\"fa fa-globe fa-fw w3-margin-right w3-text-teal\"></i>Languages</b></p>
          <p>French</p>
          <div class=\"w3-light-grey w3-round-xlarge\">
            <div class=\"w3-round-xlarge w3-teal\" style=\"height:24px;width:100%\"></div>
          </div>
          <p>English (TOEIC 920)</p>
          <div class=\"w3-light-grey w3-round-xlarge\">
            <div class=\"w3-round-xlarge w3-teal\" style=\"height:24px;width:70%\"></div>
          </div>
          <p>Spanish</p>
          <div class=\"w3-light-grey w3-round-xlarge\">
            <div class=\"w3-round-xlarge w3-teal\" style=\"height:24px;width:35%\"></div>
          </div>
          <br>
          
          <p class=\"w3-large\"><b><i class=\"fa fa-question fa-fw w3-margin-right w3-text-teal\"></i>Others</b></p>
          <p><i class=\"fa fa-address-card fa-fw w3-margin-right 
          w3-text-teal\"></i> Driver licence</p>
          <p><i class=\"fa fa-car fa-fw w3-margin-right w3-text-teal\"></i> Personnal car</p>
          
          
        </div>
      </div><br>
      
      

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class=\"w3-twothird\">
    
      <div class=\"w3-container w3-card w3-white w3-margin-bottom\">
        <h2 class=\"w3-text-grey w3-padding-10\"><i class=\"fa fa-suitcase fa-fw w3-margin-right w3-xlarge w3-text-teal\"></i>Experiences</h2>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>System Administrator</b> - <i>SII, Toulouse, France (internship)</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Mar 2019 - <span class=\"w3-tag w3-teal w3-round\">Current</span></h6>
          <p>System development to auto-deploy and configure complicated infrastructure
based on an user friendly config file describing all the servers and their config</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Web Developer (Symfony)</b> - <i>Check Your Smile, Toulouse, France (School project)</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Jan 2019 - Mar 2019</h6>
          <p>Design, development and implementation of new modules, troubleshooting
existing parts of the website</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Big Data Analyst</b> - <i>SUPSI, Manno, Switzerland (internship)</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Jun 2017 - Jul 2017</h6>
          <p>Analysis of user behavior based on theirs socials networks and cell phones
data with Python</p>
\t\t\t<hr>
        </div>
        <div class=\"w3-container\">
           <h5 class=\"w3-opacity\"><b>Technician</b> - <i>IT Center, Soual, France (internship)</i></h5>
           <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Jul 2017 - Aug 2017</h6>
           <p>Troubleshooting desktops and laptops for professionals and individuals, Com-
puting hardware sales</p>
\t\t\t<hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Web Developer (Laravel)</b> - <i>Strategies Web International, Quebec, Canada (internship)</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>Mar 2016 - Jun 2016</h6>
          <p>Web portal designing, Server configuration (web server, database, mail ser-
vices, security, git)</p>
        </div>
      </div>

      <div class=\"w3-container w3-card w3-white\">
        <h2 class=\"w3-text-grey w3-padding-10\"><i class=\"fa fa-certificate fa-fw w3-margin-right w3-xlarge w3-text-teal\"></i>Education</h2>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Master's Degree in Computer Engineering</b> - <i>ENSEEIHT, Toulouse, France</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>2016 - 2019</h6>
          <p>Matematics, Programming, Systems, Networks</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Computing HND (DUT in France)</b> - <i>Technolgy Insitute, Rodez, France</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>2014 - 2016</h6>
          <p>Matematics, Programming, Systems, Networks</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>\"A\" levels focused on Sciences</b> - <i>High School Borde Basse, Castres, France</i></h5>
          <h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>2014</h6>
          <p>With Honours <br />
\t\t\tMatematics, Physics, Engeneering Sciences
\t\t</p><br>
        </div>
      </div>
      
      <div class=\"w3-container w3-card w3-white\">
        <h2 class=\"w3-text-grey w3-padding-10\"><i class=\"fa fa-television fa-fw w3-margin-right w3-xlarge w3-text-teal\"></i>Hobbies</h2>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Mountain Bike</b></h5>
          <p>Trails construction and maintenance, riding every week-end, racing few times per years in
regional and national races, doing mechanics</p>
          <hr>
        </div>
        <div class=\"w3-container\">
          <h5 class=\"w3-opacity\"><b>Travel</b></h5>
          <p>Discover new places, travel few times during my studies (internship in Quebec and Switzer-
land), visiting new countries and cities</p>
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
{% endblock %}

", "en/cv.html.twig", "/var/www/templates/en/cv.html.twig");
    }
}
