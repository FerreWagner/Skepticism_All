<?php

/* layout.html */
class __TwigTemplate_53939cb6b8b477ed634bfcd3caf67b84783a4449f0fcde278062f8bdd398e8fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h2>layout 页面</h2>
<content>
";
        // line 3
        $this->displayBlock('content', $context, $blocks);
        // line 6
        echo "</content>";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  33 => 4,  30 => 3,  26 => 6,  24 => 3,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<h2>layout 页面</h2>
<content>
{% block content %}

{% endblock%}
</content>", "layout.html", "F:\\Demo\\ZEND\\SMVC\\app\\views\\layout.html");
    }
}
