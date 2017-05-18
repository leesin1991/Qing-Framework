<?php

/* public.html */
class __TwigTemplate_9515db587f72ec714a97ea076cf8ad3a74718920771567de6d9e0c2d77157351 extends Twig_Template
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
        echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"
\"http://www.w3.org/TR/html4/loose.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>Qing Framework</title>
    </head>
    <body>
        <content>
\t\t\t";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "        \t
        </content>
    </body>
</html>

";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        echo "  
\t\t\t
\t\t\t";
    }

    public function getTemplateName()
    {
        return "public.html";
    }

    public function getDebugInfo()
    {
        return array (  42 => 10,  33 => 12,  31 => 10,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"
\"http://www.w3.org/TR/html4/loose.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>Qing Framework</title>
    </head>
    <body>
        <content>
\t\t\t{% block content %}  
\t\t\t
\t\t\t{% endblock %}        \t
        </content>
    </body>
</html>

", "public.html", "/data/home/qxu1606400367/htdocs/qing/app/view/public.html");
    }
}
