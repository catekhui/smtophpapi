<?php
/**
 * 
 * SMSTo PHP Class
 * Version: 1.0.0
 * Author: Catherine Mwangi
 * SMS Sending Class using SMSto API
 * 
 * This class provides an easy way to send SMS using the SMSto API. 
 * Usage Example:
 * ```php
 * $sms = new Wpccb_sms(array(
 *     "country_code" => "+1",
 *     "phone" => "+1(123)123-1234",
 *     "message" => "This is a test message",
 *     "sender_id" => "YOUR COMPANY NAME",
 *     "api_key" => '',
 *     "callback_url" => "",
 * ));
 * $send = $sms->send();
 * print_r($send);
 * ```
 * 
 * Sends an SMS using the SMSto API.
 *
 * Kindly use my link to create an account to receive several free SMS credits for testing (up to 20 free SMS).
 * The cost per SMS is $0.02.
 *
 * @link   https://bit.ly/3Dw2iDQ Create an account with SMSto API.
 * @link   https://bit.ly/3XJmDwf GitHub - Simplified Send SMS Class.
 * @link   https://bit.ly/3FwYeDO SMSto Support - Create a support account and submit tickets.
 *
 * @note   If you need support, please contact SMSto via their support link or reply here, and I will respond ASAP.
 */
class Wpccb_sms {
    private $_options;

    /**
     * Constructor to initialize options.
     * 
     * @param array $options Configuration options for sending SMS.
     */
    function __construct(array $options) {
        $this->_options = $options;
    }

    /**
     * Check if a string exists within another string.
     * 
     * @param string $heystack The main string.
     * @param string $needle The substring to search for.
     * @return bool True if the substring exists, false otherwise.
     */
    function s_in_s($heystack, $needle) {
        return strpos($heystack, $needle) !== false;
    }

    /**
     * Remove extra spaces, tabs, and newlines from a text.
     * 
     * @param string $text The input text.
     * @param string $replacement The replacement for removed spaces (default: empty string).
     * @return string The cleaned text.
     */
    function remove_spaces($text, $replacement = "") {
        $text = preg_replace('/\s+/', $replacement, $text);
        return trim($text);
    }

    /**
     * Format a phone number with a country code.
     * 
     * @param string $phone The phone number.
     * @param string $defaultCountryCode The default country code (default: +1).
     * @return string The formatted phone number with country code.
     */
    function get_phone($phone, $defaultCountryCode = '+1') {
        if (!$this->s_in_s($defaultCountryCode, "+")) {
            $defaultCountryCode = "+$defaultCountryCode";
        }
        $phone = preg_replace('/[^\d+]/', '', $phone);
        if (strpos($phone, '+') === 0) {
            return $phone;
        }
        if (strpos($phone, '0') === 0) {
            $phone = substr($phone, 1);
        }
        return $defaultCountryCode . $phone;
    }

    /**
     * Send an SMS message via SMSto API.
     * 
     * @return string JSON response from the API.
     */
    function send() {
        $required_keys = ['phone', 'message', 'api_key', 'sender_id', 'country_code'];
        foreach ($required_keys as $key) {
            if (!array_key_exists($key, $this->_options)) {
                echo ucfirst(str_replace('_', ' ', $key)) . " is required to send an SMS.";
                return;
            }
        }

        if ($this->remove_spaces($this->_options['message']) == "") {
            echo "You cannot send an empty SMS.";
            return;
        }

        $the_phone = $this->get_phone($this->_options['phone'], $this->_options['country_code']);
        $message = $this->remove_spaces($this->_options['message'], " ");
        $to = $the_phone;
        $api_key = $this->_options['api_key'];
        $sender_id = $this->_options['sender_id'];
       	$callback_url = array_key_exists( "callback_url", $this->_options) ? ( $this->_options['callback_url'] == "" ? "https://example.com/callback/handler" : $this->_options['callback_url'] ): "https://example.com/callback/handler";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sms.to/sms/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "message" => $message,
                "to" => $to,
                "bypass_optout" => true,
                "sender_id" => $sender_id,
                "callback_url" => $callback_url
            ]),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $api_key",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
