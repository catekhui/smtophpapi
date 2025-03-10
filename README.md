# **SMSTo PHP Class**  
This is a PHP class that simplifies sending SMS messages using the **SMSTo API**. Always refer to the **SMSTo API documentation** if you encounter any issues, and feel free to report any problems.  

This repository will be kept up to date, so you don’t have to worry about outdated files.  

## **How to Send SMS Using This Class**  
```php
$sms = new Wpccb_sms(array(
    "country_code" => "+1",
    "phone" => "+1(123)123-1234",
    "message" => "This is a test message",
    "sender_id" => "YOUR COMPANY NAME",
    "api_key" => '',
));

$send = $sms->send();
print_r($send);
```

## **Important Notes**  
- The **Sender ID** can be your company name. Keep it short, as a long Sender ID may cause SMS delivery failures. Always print the **SMS send** object to check the response.  
- For users in **Canada, USA,** or **Puerto Rico**, you must use a **custom Sender ID** provided by **SMSTo Support** after submitting the **TFN document**. If you are in one of these countries, please contact **SMSTo Support** before sending SMS messages to configure your account.  
  - You can reach them by sending an email to **support@sms.to** or by creating a new support ticket at [https://support.sms.to/support/home](https://support.sms.to/support/home).  
  - They typically respond within minutes.  
- Ensure that the country code includes the **plus sign (`+`) followed by the country code**.  

## **What is a TFN Document?**  
To send SMS messages to recipients in the **USA, Canada,** and **Puerto Rico**, network providers require you to **rent a Toll-Free Number (TFN)** and register it. You must also provide proof of **opt-in consent** from users. If this process is not completed correctly, messages will fail.  

Additionally, regulations in these countries require proof of opt-in and opt-out for SMS communication. For example, at the end of every SMS, you can include:  
> _"REPLY STOP to stop receiving these messages."_  

To comply with these requirements, **SMSTo** will provide you with a **TFN document**. Simply **fill it out and submit it as a PDF**, and your setup will be complete.  

📌 If you are in any of the aforementioned countries, please contact **SMSTo Support** to get the **TFN document** and additional information at:  
[https://support.sms.to/support/home](https://support.sms.to/support/home)  

## **Send Function Return Type**  
The `send()` function returns a **JSON string**.  

## **Support & Donations**  
My name is **Cate**, a passionate **lady developer**. If you find this class helpful, please consider supporting its future development by:  
🍵 **Buying me a coffee** via PayPal: **catekhui130@gmail.com**  
🔗 **Creating an SMSTo account** using my referral link (I will receive a small commission for SMS sent):  
[https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613](https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613)  

