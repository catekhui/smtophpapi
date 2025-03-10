#SMSTo PHP File
This is a PHP class that eases the sending of sms with  SMSto API, always refer to the SMSto API documentation in case you encounter any problems, and always report issues. Having said that, this repo will be kept up to date so you don't have to worry much about outdated files.

##How to send SMS with this file
```
$sms = new Wpccb_sms(array(
	"country_code" => "+1",
	"phone" => "+1(123)123-1234",
	"message" => "This is a test message", 
	"sender_id"=> "YOUR COMPANY NAME",
	"api_key"=>'',

));

$send = $sms->send();
print_r($send);
```
##Things to note
-The **sender ID** can be your company name, kindly keep it super short, a long sender ID will lead to sms failing, always print the **sms send** object to see the outcome.
-For the users in Canada, USA or Puerto Rico, you will use a custom Sender ID provided by SMSto Support after submitting the TFN document.If you are the metioned countries, make sure you contanct the sms to support before you start sending the SMSs to configure your account. You can contact them by sending an email to support@sms.to or by creating a new support ticket at [https://support.sms.to/support/home](https://support.sms.to/support/home).
-Make sure the country code contains plus sign plus country code

##Send function return type
The send function returns a JSON string. 

My name is Cate, Kindly support the future development of this class by sending  coffee on PayPal at catekhui130@gmail.com, or  use the following link to create an account on the SMSto, I will get a small commission for the SMSs sent.
[https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613](https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613)

