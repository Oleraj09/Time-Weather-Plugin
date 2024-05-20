<?php

/**
 *  @package Time and Weather
 */
/*
Plugin Name: Simple Weather & Time Update
Plugin URI: htttp://github.com/oleraj09/weather-time-wpdate
Description: A simple tinny navbar plugin that provide current time and date. Also provide location and current temperature Update!
Version: 1.0.1
Author: Oleraj Hossin
Author URI: https://olerajhossin.com
Text Domain: Weather-and-Time
*/

if (!defined('ABSPATH')) {
    exit;
}

function stylesheet()
{
    wp_enqueue_style('style1x', plugins_url('/assets/css/style.css', __FILE__));
    wp_enqueue_style('style2x', plugins_url('/assets/css/font-awasome/all.css', __FILE__));
    wp_enqueue_script('script1x', plugins_url('/assets/css/font-awasome/all.js', __FILE__));
    wp_enqueue_script('script2x', plugins_url('/assets/js/tailwind.js', __FILE__));
}
add_action("wp_enqueue_scripts", "stylesheet");
// Register the admin menu
function weather_menu()
{
    add_menu_page('Weather and Time', 'Weather and Time', 'manage_options', 'weather-menu-display', 'weather_overview', '', 30);
    add_submenu_page('weather-menu-display', 'Weather Settings', 'Weather Settings', 'manage_options', 'weather-settings', 'weather_settings');
}
add_action('admin_menu', 'weather_menu');

//Menu Display Function
function weather_overview()
{
?>
    <div class="min-h-screen h-auto overflow-auto p-5">
        <h1 class="text-[30px] font-semibold pb-5">Dashboard</h1>
        <div class="bg-[#151515] px-[10%] py-[10%]">
            <h1 class="text-[48px] font-bold text-white">Welcome to Weather & Time</h1>
            <p class="text-white text-[20px] font-semibold">Current Version v1.0.1</p>
        </div>
        <div class="bg-[#FFFFFF] px-[10%] py-[2%]">
            <div class="flex flex-col xl:flex-row gap-x-4">
                <div class="flex-1 py-5">
                    <div class="flex flex-row">
                        <div class="flex-2"><i class="fa-solid fa-3x fa-circle-info"></i></div>
                        <div class="flex-1 px-5">
                            <h1 class="text-[20px] font-bold pb-3">Simplicity is Best way!!</h1>
                            <p class="text-[15px] font-semibold text-justify">
                                Simple plugin to add weather update in your website. Here you find current location
                                , date and time. It's a tinny intract navbar that's look nice and fit for all type of website.
                                Please try and have a look. <br> <span class="text-[green] italic">Owwwww, Do you know? it's fully responsive. So why late?</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex-1 py-5">
                    <div class="flex flex-row">
                        <div class="flex-2"><i class="fa-brands fa-3x fa-react"></i></div>
                        <div class="flex-1 px-5">
                            <h1 class="text-[20px] font-bold pb-3">Easy Setup with API's</h1>
                            <p class="text-[15px] font-semibold text-justify">
                                Register in weatherapi.com to get the API and API key free. It is easy and simple to implement.
                                weatherapi.com provide a avarage api hits for free. so why late? Register and get the API key!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex-1 py-5">
                    <div class="flex flex-row">
                        <div class="flex-2"><i class="fa-solid fa-3x fa-pen-to-square"></i></div>
                        <div class="flex-1 px-5">
                            <h1 class="text-[20px] font-bold pb-3">Want to Customize your Navbar?</h1>
                            <p class="text-[15px] font-semibold text-justify">
                                A Tinny intract navbar that's look nice and fit for all type of website. You can place it anywhere and 
                                have a simple look. you can change text and background color according to your website demand.
                                <br> <span class="text-[green] italic">Nice, It is customizable.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="text-[30px] font-semibold py-5">Instruction</h1>
        <div class="pb-[2%]">
            <iframe class="w-full xl:h-[700px] md:h-[500px] sm:h-[400px] h-[300px]" src="https://www.youtube.com/embed/WWKTfAI1saU?si=fguTtMessiwhBVTC"></iframe>
        </div>
        <div class="bg-[#FFFFFF] px-[10%] py-[2%]">
            <div class="text-center">
                <p class="text-[20px] font-semibold italic">Developed By</p>
                <p class="text-[16px]">Md. Oleraj Hossin</p>
                <p class="text-[14px]">Mirpur, Dhaka, Bangladesh</p>
                <p class="text-[14px]">Bangladesh University of Business and Technology</p>
                <p class="text-[14px]">Wordpress and Laravel Developer</p>
                <p class="text-[14px]">Working at DynamicFlow IT</p>
            </div>
        </div>
    </div>
<?php
}
function weather_settings()
{
    global $wpdb;
    $id = 1;
    $table_name = $wpdb->prefix . 'weather';
    $results = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id));
    // echo '<pre>';
    // print_r($results->apikey)
    function getUserIP()
    {
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if ($ip == '::1') {
            $ip = '103.150.27.73';
        }
        return $ip;
    }
    $ipAddress = getUserIP();
    $location = "http://ip-api.com/php/$ipAddress";
    $adress = unserialize(file_get_contents($location));
?>
    <div class="min-h-screen h-auto overflow-visible p-5">
        <h1 class="text-[30px] font-semibold pb-5">Dashboard</h1>
        <div class="bg-[#151515] px-[10%] py-[2%]">
            <h1 class="text-[48px] font-bold text-white">Customize Your Information</h1>
            <p class="text-white text-[20px] font-semibold">Weather & Time v1.0.1</p>
        </div>
        <div class="bg-[#FFFFFF] px-[10%] py-[2%]">
            <h1 class="text-[20px] font-semibold italic py-5">Instruction</h1>
            <p class="text-[16px] italic">Your Area is <?= $adress['city'] . ' & Country is ' . $adress['country'] . ' and Lattidute is ' . $adress['lat'] . ' & Longitude is ' . $adress['lon'] ?> </p>
            <div class="text-[15px] px-10 py-5">
                <li>Frist Go to <a class="text-[blue] cursor:pointer font-semibold" href="https://www.weatherapi.com/">Weather API</a> Resgister a account and Login to the account.</li>
                <li>Go to you account Section. You find there a API KEY that's look like "e4172823a365483dbe7221644241605" Copy that and past to bellow API input field.</li>
                <li>Also need area name and Lattitude and longitude that is provided above. Copy and Paste to Specific input field and Submit.</li>
                <li>Copy the short code from bellow and paste that shortcode where you want to add this mini navbar. I recomand you to use as tinny nabar before the main navbar.</li>
            </div>
            <p class="text-[16px] italic">NB: You can change navbar background color and text color form bellow.</p>
        </div>
        <form action="" method="POST">
            <?php
            if ($results) {
            ?>
                <div class="bg-[#FFFFFF] px-[10%] py-[2%]">
                    <h1 class="text-[20px] font-semibold italic py-5">Enter Required Credential</h1>
                    <div class="flex flex-col 2xl:flex-row lg justify-between pb-20">
                        <input class="2xl:w-[80%] w-[100%] my-2" name="apikey" type="text" placeholder="Enter Your API key" value="<?= $results->apikey ?>">
                        <input class="bg-[blue] py-2 px-20 rounded-md text-white font-semibold cursor-pointer my-2" type="submit" value="SUBMIT">
                    </div>
                    <hr>
                    <h1 class="text-[20px] font-semibold italic pb-5 pt-16">Customize Navbar Color</h1>
                    <div class="flex flex-col 2xl:flex-row lg justify-between">
                        <h1 class="text-[20px] font-semibold italic py-1">Background Color</h1>
                        <input class="2xl:w-[18%] w-[100%] my-1" type="color" name="bgcolor" value="<?= $results->bgcolor ?>" placeholder="Background Color">
                        <h1 class="text-[20px] font-semibold italic py-1">Text Color</h1>
                        <input class="2xl:w-[18%] w-[100%] my-1" type="color" name="textcolor" value="<?= $results->textcolor ?>" placeholder="Text Color">
                        <input class="bg-[blue] py-2 px-20 rounded-md text-white font-semibold cursor-pointer my-2" type="submit" value="CHANGE">
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="bg-[#FFFFFF] px-[10%] py-[2%]">
                    <h1 class="text-[20px] font-semibold italic py-5">Enter Required Credential</h1>
                    <div class="flex flex-col 2xl:flex-row lg justify-between pb-20">
                        <input class="2xl:w-[18%] w-[100%] my-2" name="apikey" type="text" placeholder="Enter Your API key" value="<?php $results->apikey ?>">
                        <input class="2xl:w-[18%] w-[100%] my-2" name="area" type="text" placeholder="Your Area Name">
                        <input class="2xl:w-[18%] w-[100%] my-2" name="late" type="text" placeholder="Lattitude">
                        <input class="2xl:w-[18%] w-[100%] my-2" name="longi" type="text" placeholder="Longitude">
                        <input class="bg-[blue] py-2 px-20 rounded-md text-white font-semibold cursor-pointer my-2" type="submit" value="SUBMIT">
                    </div>
                    <hr>
                    <h1 class="text-[20px] font-semibold italic pb-5 pt-16">Customize Navbar Color</h1>
                    <div class="flex flex-col 2xl:flex-row lg justify-between">
                        <h1 class="text-[20px] font-semibold italic py-1">Background Color</h1>
                        <input class="2xl:w-[18%] w-[100%] my-1" type="color" name="bgcolor" value="<?php $results->bgcolor ?>" placeholder="Background Color">
                        <h1 class="text-[20px] font-semibold italic py-1">Text Color</h1>
                        <input class="2xl:w-[18%] w-[100%] my-1" type="color" name="textcolor" value="<?php $results->textcolor ?>" placeholder="Text Color">
                        <input class="bg-[blue] py-2 px-20 rounded-md text-white font-semibold cursor-pointer my-2" type="submit" value="CHANGE">
                    </div>
                </div>
            <?php
            }
            ?>
        </form>
        <div class="bg-[#FFFFFF] px-[10%] pt-[3%] pb-[2%]">
            <h1 class="text-[20px] font-semibold italic pt-5">Desktop and Responsive View</h1>
            <div class="demos my-5 px-[10%] border-2 py-2">
                <div class="flex justify-center items-center">
                    <img class="py-2 w-[100%]" src="<?php echo plugins_url('/assets/images/Screenshot 2024-05-17 070733.png', __FILE__) ?>" alt="">
                </div>
                <div class="flex justify-center items-center">
                    <img class="py-2" src="<?php echo plugins_url('/assets/images/Screenshot 2024-05-17 070832.png', __FILE__) ?>" alt="">
                </div>
            </div>
            <h1 class="text-[20px] font-semibold italic py-5">Get Your Shortcode Below</h1>
            <p class="italic py-0">Copy the shortcode and past before your website navbar. Get the awasome time, location and weather Update in real time!</p>
            <div class="bg-[#1D2327] my-10 py-5">
                <div class="text-center text-white font-semibold">
                    [tinny-navbar-weather]
                </div>
            </div>
        </div>
        <div class="bg-[#000000] px-[10%] py-[2%]">
            <div class="text-center">
                <p class="text-[20px] font-semibold italic">Developed By</p>
                <p class="text-[16px]">Md. Oleraj Hossin</p>
                <p class="text-[14px]">Mirpur, Dhaka, Bangladesh</p>
                <p class="text-[14px]">Bangladesh University of Business and Technology</p>
                <p class="text-[14px]">Wordpress and Laravel Developer</p>
                <p class="text-[14px]">Working at DynamicFlow IT</p>
            </div>
        </div>
    </div>
<?php
}
//Navbar Shortcode
function tinny_navbar()
{
    global $wpdb;
    $id = 1;
    $table_name = $wpdb->prefix . 'weather';
    $results = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id));
    // ---------------Location and Weather-------------------------
    function getUserIPs()
    {
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if ($ip == '::1') {
            $ip = '103.150.27.73';
        }
        return $ip;
    }
    $ipAddresss = getUserIPs();
    $location = "http://ip-api.com/php/$ipAddresss";
    $adress = unserialize(file_get_contents($location));
    $area = $adress['city'];
    if (!empty($results->apikey)) {
        $weatherapi = "http://api.weatherapi.com/v1/current.json?key=$results->apikey&q=$area&aqi=no";
        $weather = file_get_contents($weatherapi);
        $data = json_decode($weather);
    }
    $timezone = new DateTimeZone($adress['timezone']);
    $localTime = new DateTime('now', $timezone);

?>
    <div class="h-[150px] md:h-[60px] bg-[<?= $results->bgcolor ?>] text-[<?= $results->textcolor ?>] p-4">
        <div class="flex flex-col md:flex-row h-full container mx-auto">
            <div class="flex-1 flex justify-center items-center text-center md:justify-start md:text-left">
                <div class="time text-[15px] italic font-semibold">
                    <p><i class="fa-solid fa-clock"></i><?= ' ' . $localTime->format('g:i A'); ?></p>
                    <p><?= $localTime->format('l j F, Y'); ?></p>
                </div>
            </div>
            <div class="flex-1 flex justify-center items-center text-center md:justify-end md:text-right">
                <div class="temp text-[15px] italic font-semibold">
                    <p><?= $adress['city'] . ', ' . $adress['country'] ?></p>
                    <p><?= $data->current->temp_c ?? '' ?>&deg;C <?= $data->current->condition->text ?? ''?>  Sky <i class="fa-solid fa-cloud-moon-rain"></i></p>
                </div>
            </div>
        </div>
    </div>
<?php
}
add_shortcode('tinny-navbar-weather', 'tinny_navbar');


//Table insert into Database
function weather_update_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'weather';
    // SQL to create your table
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        apikey VARCHAR(255) NOT NULL,
        bgcolor VARCHAR(100) NOT NULL,
        textcolor VARCHAR(100) NOT NULL,
        PRIMARY KEY  (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'weather_update_table');
function insert_initial_data()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'weather';
    $wpdb->insert(
        $table_name,
        array(
            'id' => '1',
            'apikey' => '',
            'textcolor' => '#ffffff',
            'bgcolor' => '#38bdf8'
        )
    );
}
register_activation_hook(__FILE__, 'insert_initial_data');

//Data take from diplay page and insert to Database
function insert_data()
{
    if (isset($_POST['apikey']) && isset($_POST['bgcolor']) && isset($_POST['textcolor'])) {
        $apikey = $_POST['apikey'];
        $area = $_POST['area'];
        $late = $_POST['late'];
        $longi = $_POST['longi'];
        $bgcolor = $_POST['bgcolor'];
        $textcolor = $_POST['textcolor'];
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'weather';
            $wpdb->update(
                $table_name,
                array(
                    'apikey' => $apikey,
                    'textcolor' =>  $textcolor,
                    'bgcolor' => $bgcolor
                ),
                array(
                    'id' => 1
                )
            );
            $location = $_SERVER['HTTP_REFERER'];
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            echo "<script>alert('There Someting Wrong in Input Field!');</script>";
            $location = $_SERVER['HTTP_REFERER'];
            wp_safe_redirect($location);
            exit;
        }
    }
}
add_action('init', 'insert_data');

class WeatherUpdate
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'assets'));
    }
    function assets()
    {
        wp_enqueue_style('style1x', plugins_url('/assets/css/style.css', __FILE__));
        wp_enqueue_style('style2x', plugins_url('/assets/css/font-awasome/all.css', __FILE__));
        wp_enqueue_script('script1x', plugins_url('/assets/css/font-awasome/all.js', __FILE__));
        wp_enqueue_script('script2x', plugins_url('/assets/js/tailwind.js', __FILE__));
    }
}
if (class_exists('WeatherUpdate')) {
    $weatherclass = new WeatherUpdate;
    $weatherclass->register();
}
