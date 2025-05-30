<?php
/*  PHPlot web form example

  Parameter names and parameter array keys:
    'deposit' = Amount deposited per month.
    'intrate' = Interest rate as a percentage (e.g. 4 means 4% or 0.04)
*/

# Name of script which generates the actual plot:
define('GRAPH_SCRIPT', 'webform_img.php');
# Image size. It isn't really necessary that this script know this image
# size, but it improves page rendering.
define('GRAPH_WIDTH', 600);
define('GRAPH_HEIGHT', 400);

# Default values for the form parameters:
$param = array('deposit' => 100.00, 'intrate' => 4.0);

//Function build_url() is a general-purpose function used to generate a URL to a script with parameters. The parameters are in a PHP associative array. The return value is a relative or complete URL which might look like this: webform_img.php?deposit=100&intrate=4.0&h=400&w=600.

# Build a URL with escaped parameters:
#   $url - The part of the URL up through the script name
#   $param - Associative array of parameter names and values
# Returns a URL with parameters. Note this must be HTML-escaped if it is
# used e.g. as an href value. (The & between parameters is not pre-escaped.)
function build_url($url, $param)
{
    $sep = '?';  // Separator between URL script name and first parameter
    foreach ($param as $name => $value) {
        $url .= $sep . urlencode($name) . '=' . urlencode($value);
        $sep = '&';   // Separator between subsequent parameters
    }
    return $url;
}

//The function begin_page() creates the HTML at the top of the page. In a real application, this might include a page header.

# Output the start of the HTML page:
function begin_page($title)
{
    echo <<<END
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
                      "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>$title</title>
</head>
<body>
<h1>$title</h1>

END;
}

//The function end_page() creates the HTML at the end of the page. In a real application, this might include a page footer.

# Output the bottom of the HTML page:
function end_page()
{
    echo <<<END
</body>
</html>

END;
}

//The function show_descriptive_text() produces HTML text which describes the form. This will go above the form on the web page.

# Output text which describes the form.
function show_descriptive_text()
{
    echo <<<END
<p>
This page calculates the balance over time in an interest-earning savings
account when fixed monthly deposits are made and there are no withdrawals.
</p>
<p>
Fill in the values below and click on the button to display a
graph of the account balance over time.
</p>

END;
}

//The function show_form() outputs the HTML form. This includes entry boxes for the two parameters and a submit button. The form action URL is this script itself, so we use the SCRIPT_NAME value to self-reference the script.

# Output the web form.
# The form resubmits to this same script for processing.
# The $param array contains default values for the form.
# The values have already been validated as containing numbers and
# do not need escaping for HTML.
function show_form($param)
{
    $action = htmlspecialchars($_SERVER['SCRIPT_NAME']);

    echo <<<END
<form name="f1" id="f1" method="get" action="$action">
<table cellpadding="5" summary="Entry form for balance calculation">
<tr>
  <td align="right"><label for="deposit">Monthly Deposit Amount:</label></td>
  <td><input type="text" size="10" name="deposit" id="deposit"
       value="{$param['deposit']}">
</tr>
<tr>
  <td align="right"><label for="intrate">Interest Rate:</label></td>
  <td><input type="text" size="10" name="intrate" id="intrate"
      value="{$param['intrate']}">%
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value="Display Graph"></td>
</tr>
</table>
</form>

END;
}

//The function check_form_params() performs the important task of validating the parameters received from a form submission. Each parameter is checked for presence and syntax, then converted to the appropriate PHP type. This function is also used to determine if a plot should be displayed. A plot is displayed only if valid form parameters were received.

# Check for parameters supplied to this web page.
# If there are valid parameters, store them in the array argument and
# return True.
# If there are no parameters, or the parameters are not valid, return False.
function check_form_params(&$param)
{
    $valid = True;

    if (!isset($_GET['deposit']) || !is_numeric($_GET['deposit'])
           || ($deposit = floatval($_GET['deposit'])) < 0)
        $valid = False;

    if (!isset($_GET['intrate']) || !is_numeric($_GET['intrate'])
           || ($intrate = floatval($_GET['intrate'])) < 0 || $intrate > 100)
        $valid = False;

    if ($valid) $param = compact('deposit', 'intrate');
    return $valid;
}

//The function show_graph() produces the HTML which will will invoke the second script to produce the graph. This is an image (img) tag which references the second script, including the parameters the script needs to generate the plot. This is one of several ways to pass parameters from the form handling script and the image generating script. The other way is using session variables. Using URL parameters is simpler, especially when there are only a few parameters. Note the HTML also specifies the width and height of the plot image. This is not necessary, however it helps the browser lay out the page without waiting for the image script to complete.

# Display a graph.
# The param array contains the validated values: deposit and intrate.
# This function creates the portion of the page that contains the
# graph, but the actual graph is generated by the $GRAPH_SCRIPT script.
function show_graph($param)
{
    # Include the width and height as parameters:
    $param['w'] = GRAPH_WIDTH;
    $param['h'] = GRAPH_HEIGHT;
    # URL to the graphing script, with parameters, escaped for HTML:
    $img_url = htmlspecialchars(build_url(GRAPH_SCRIPT, $param));

    echo <<<END
<hr>
<p>
Graph showing the account balance over time, with monthly deposits of
{$param['deposit']} and earning annual interest of {$param['intrate']}%:

<p><img src="$img_url" width="{$param['w']}" height="{$param['h']}"
    alt="Account balance graph.">

END;
}

//Finally, with all the functions defined, the main code is just a few lines.

# This is the main processing code.
begin_page("PHPlot: Example of a Web Form and Plot");
$params_supplied = check_form_params($param);
show_descriptive_text();
show_form($param);
if ($params_supplied) show_graph($param);
end_page();
