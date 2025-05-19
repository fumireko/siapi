<?php

# 5.23.2. Web Form Image Script
# This section presents the second script webform_img.php, which generates the plot using PHPlot. The URL to this script, along with its parameters, is embedded in the web page produced by the main script in Section 5.23.1, “Web Form Main Script”. When the user's browser asks the web server for the image, this second script runs and generates the plot.

# The script begins with a descriptive comment and then includes the PHPlot source.

//<?php
/*  PHPlot web form example - image generation

    This draws the plot image for webform.php
    It expects the following parameters:
       'deposit' = Amount deposited per month. Must be >= 0.
       'intrate' = Interest rate as a percentage (e.g. 4 means 4% or 0.04)
       'w', 'h' = image width and height. (Must be between 100 and 5000)
*/
require_once 'phplot.php';

# Function check_form_params() validates the parameters supplied to the script. Two parameters are required (intrate and deposit), and two are optional (h and w). Even though the main script validated the parameters it passes to this script, it is still necessary for the script to do its own validation. That is because any accessible script can be called from any other web page, or directly from a browser, with arbitrary parameters. (Error handling details can be found below.)

# Check for parameters supplied to this web page.
# Parameters must be checked here, even though the calling script checked them,
# because there is nothing stopping someone from calling this script
# directly with arbitrary parameters.
# Parameter values are stored in the param[] array (valid or not).
# If the parameters are valid, return True, else return False.
function check_form_params(&$param)
{
    $valid = True;
    $depost = 0;
    $intrate = 0;

    if (!isset($_GET['deposit']) || !is_numeric($_GET['deposit'])
           || ($deposit = floatval($_GET['deposit'])) < 0)
        $valid = False;

    if (!isset($_GET['intrate']) || !is_numeric($_GET['intrate'])
           || ($intrate = floatval($_GET['intrate'])) < 0 || $intrate > 100)
        $valid = False;

    # If width and height are missing or invalid, just use something reasonable.
    if (empty($_GET['w']) || !is_numeric($_GET['w'])
           || ($w = intval($_GET['w'])) < 100 || $w > 5000)
        $w = 1024;
    if (empty($_GET['h']) || !is_numeric($_GET['h'])
           || ($h = intval($_GET['h'])) < 100 || $h > 5000)
        $h = 768;

    $param = compact('deposit', 'intrate', 'h', 'w');
    return $valid;
}

# Function calculate_data() computes the data for the plot. This uses the parameters supplied to the script, and populates a data array suitable for PHPlot. Because the script uses the data-data format, each row in the array consists of a label (unused), X value (this is the month number), and 2 Y values (account balance without interest, and account balance with interest).

# Calculate the data for the plot:
# This is only called if the parameters are valid.
# The calculation is simple. Each month, two points are calculated: the
# cumulative deposts (balance without interest), and balance with interest.
# At time 0 the balance is 0. At the start of each month, 1/12th of
# the annual interest rate is applied to the balance, and then the deposit
# is added, and that is reported as the balance.
# We calculate for a fixed amount of 120 months (10 years).
function calculate_data($param, &$data)
{
    $deposit = $param['deposit'];
    $monthly_intrate = 1.0 + $param['intrate'] / 100.0 / 12.0;
    $balance_without_interest = 0;
    $balance = 0;
    $data = array(array('', 0, 0, 0)); // Starting point
    for ($month = 1; $month <= 120; $month++) {
        $balance_without_interest += $deposit;
        $balance = $balance * $monthly_intrate + $deposit;
        $data[] = array('', $month, $balance_without_interest, $balance);
    }
}

#  Function draw_graph() uses PHPlot to actually produce the graph. This function is similar to the other code examples in this chapter. A PHPlot object is created, set up, and then told to draw the plot. If the script parameters are not valid, however, an attempt is made to draw the plot without a data array. This results in an error, which PHPlot handles by creating an image file with an error message. This method of error handling is used because the script cannot return a textual error message since it is referenced from a web page via an image (img) tag. An alternative to this error handling is to have the script return an HTTP error code such as error 500 (server error).

# Draw the graph:
function draw_graph($valid_params, $param, $data)
{
    extract($param);

    $plot = new PHPlot($w, $h);
    $plot->SetTitle('Savings with Interest');
    $plot->SetDataType('data-data');
    # Don't set data values if parameters were not valid. This will result
    # in PHPlot making an image with an error message.
    if ($valid_params) {
        $plot->SetDataValues($data);
    }
    $plot->SetLegend(array('Deposits only', 'Deposits with Interest'));
    $plot->SetLegendPixels(100, 50); // Move legend to upper left
    $plot->SetXTitle('Month');
    $plot->SetXTickIncrement(12);
    $plot->SetYTitle('Balance');
    $plot->SetYLabelType('data', 2);
    $plot->SetDrawXGrid(True);
    $plot->SetPlotType('lines');
    $plot->DrawGraph();
}

# Lastly, the main code for the image drawing script simply uses the above functions.

# This is our main processing code.
$valid_params = check_form_params($param);
if ($valid_params) calculate_data($param, $data);
draw_graph($valid_params, $param, $data);

