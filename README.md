# **PHP SMS API Integration with SMSto**

## Overview
This repository provides a simple PHP class to send SMS using the SMSto API. Easily integrate SMS functionality into your web or mobile applications with just a few lines of code.

Always refer to the SMSto documentation in the developers section, [https://developers.sms.to/](https://developers.sms.to/). 

This repository will be kept up to date, so you don’t have to worry about outdated files.

## Features
- Send SMS messages via SMSto API
- Supports custom sender IDs (subject to country regulations)
- Automatic phone number formatting and validation
- Error handling for required parameters
- Callback URL support for message status updates

## Installation
1. Clone this repository:
   ```bash
   git clone https://github.com/catekhui/smtophpapi.git
   ```
2. Include the class in your project:
   ```php
   require_once 'Wpccb_sms.php';
   ```

## Requirements

- PHP 7.0 or later
- cURL extension enabled

## **How to Send SMS Using This Class**

```php
//some countries are not allowed to use custom sender ID
// if you are in a country where TFN number is required, that the one will be used as a sender ID
// contact support at support@sms.to to get a TFN number, if it's a requirement in your country
$sms = new Wpccb_sms(array(
    "country_code" => "+1",
    "phone" => "+1(604)123-1234",
    "message" => "This is a test message",
    "sender_id" => "YOUR COMPANY NAME",//keep it super short
    "api_key" => '',
    "callback_url" => "", // optional
));

$send = $sms->send();
print_r($send); // Returns a JSON response
```
Following is example of responses gotten from this class. Please always make sure you print the response method on the browser for a detailed responses. 

### **Successful Response**


```json
{
  "message": "Message is queued for sending! Please check report for update",
  "success": true,
  "message_id": "473590-1741446-80d0-6ff4-xxxxxxx"
}
```

### **Failure Response**

```json
{
  "success": false,
  "message": "Invalid API Key or Token",
  "data": []
}
```

## Registration
To start sending SMS, create an account with SMSto using the link below:
👉 [Create an Account](https://bit.ly/3Dw2iDQ)

## Support
For any support, please use the official SMSto support ticket system:
👉 [Submit a Support Ticket](https://bit.ly/3FwYeDO)

Alternatively, you can reply to this repository's issues section, and I will respond as soon as possible.

## **Important Notes**

- The **Sender ID** can be your company name. Keep it short, as a long Sender ID may cause SMS delivery failures. Always print the **SMS send** object to check the response.
- For users in **Canada, USA,** or **Puerto Rico**, you must use a **custom Sender ID** provided by **SMSTo Support** after submitting the **TFN document**. If you are in one of these countries, please contact **SMSTo Support** before sending SMS messages to configure your account.
  - You can reach them by sending an email to **[support@sms.to](mailto\:support@sms.to)** or by creating a new support ticket at [https://support.sms.to/support/home](https://support.sms.to/support/home).
  - They typically respond within minutes.
- Ensure that the country code includes the **plus sign (****`+`****) followed by the country code**.

## **What is a TFN Document?**

To send SMS messages to recipients in the **USA, Canada,** and **Puerto Rico**, network providers require you to **rent a Toll-Free Number (TFN)** and register it. You must also provide proof of **opt-in consent** from users. If this process is not completed correctly, messages will fail.

Additionally, regulations in these countries require proof of opt-in and opt-out for SMS communication. For example, at the end of every SMS, you can include:

> *"REPLY STOP to stop receiving these messages."*

To comply with these requirements, **SMSTo** will provide you with a **TFN document**. Simply **fill it out and submit it as a PDF**, and your setup will be complete.

📌 If you are in any of the aforementioned countries, please contact **SMSTo Support** to get the **TFN document** and additional information at:\
[https://support.sms.to/support/home](https://support.sms.to/support/home)

## **Send Function Return Type**

The `send()` function returns a **JSON string**.

## **Registration & Support**

- 📌 **Create an SMSTo account** using my referral link: [https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613](https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613)
- 🛠 **Submit Support Tickets:** [https://support.sms.to/support/home](https://support.sms.to/support/home)

## **Support & Donations**

My name is **Cate**, a passionate **lady developer**. If you find this class helpful, please consider supporting its future development by:\
🍵 **Buying me a coffee** via PayPal: **[catekhui130@gmail.com](mailto\:catekhui130@gmail.com)**\
🔗 **Creating an SMSTo account** using my referral link (I will receive a small commission for SMS sent):\
[https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613](https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613)

## License
This project is licensed under the MIT License - see the LICENSE file for details.



## SMS Pricing Per Country 2025 (Sorted by Cost)

| Country | Country Code | Price per SMS | Currency |
|---------|-------------|--------------|----------|
| Colombia | CO | 0.009 | EUR (€) |
| Turkey | TR | 0.009 | EUR (€) |
| Thailand | TH | 0.016 | EUR (€) |
| North Korea - Korea The Democratic People's Republic of | KP | 0.016 | EUR (€) |
| Cyprus | CY | 0.018 | EUR (€) |
| Portugal | PT | 0.019 | EUR (€) |
| Macao | MO | 0.019 | EUR (€) |
| Brazil | BR | 0.02 | EUR (€) |
| Macedonia | MK | 0.02 | EUR (€) |
| United States | US | 0.022 | EUR (€) |
| Korea | KR | 0.022 | EUR (€) |
| Greenland | GL | 0.023 | EUR (€) |
| Puerto Rico | PR | 0.026 | EUR (€) |
| Bahrain | BH | 0.0261 | EUR (€) |
| Canada | CA | 0.0265 | EUR (€) |
| Poland | PL | 0.027 | EUR (€) |
| Australia | AU | 0.028 | EUR (€) |
| Namibia | nan | 0.03 | EUR (€) |
| Costa Rica | CR | 0.031 | EUR (€) |
| Uruguay | UY | 0.032 | EUR (€) |
| Singapore | SG | 0.033 | EUR (€) |
| Lithuania | LT | 0.0345 | EUR (€) |
| Spain | ES | 0.035 | EUR (€) |
| Chile | CL | 0.036 | EUR (€) |
| Estonia | EE | 0.037 | EUR (€) |
| Central African Republic | CF | 0.038 | EUR (€) |
| Austria | AT | 0.038 | EUR (€) |
| United Kingdom | GB | 0.039 | EUR (€) |
| Mexico | MX | 0.0398 | EUR (€) |
| Latvia | LV | 0.04 | EUR (€) |
| Romania | RO | 0.04 | EUR (€) |
| Tokelau | TK | 0.04 | EUR (€) |
| Bahamas | BS | 0.042 | EUR (€) |
| Denmark | DK | 0.043 | EUR (€) |
| Greece | GR | 0.044 | EUR (€) |
| Norway | NO | 0.045 | EUR (€) |
| Ireland | IE | 0.045 | EUR (€) |
| Brunei Darussalam | BN | 0.045 | EUR (€) |
| American Samoa | AS | 0.047 | EUR (€) |
| Italy | IT | 0.048 | EUR (€) |
| Faroe Islands | FO | 0.049 | EUR (€) |
| Japan | JP | 0.05 | EUR (€) |
| Taiwan | TW | 0.05 | EUR (€) |
| Switzerland | CH | 0.05 | EUR (€) |
| Sweden | SE | 0.05 | EUR (€) |
| Solomon Islands | SB | 0.052 | EUR (€) |
| Croatia | HR | 0.052 | EUR (€) |
| Hong Kong | HK | 0.052 | EUR (€) |
| Botswana | BW | 0.052 | EUR (€) |
| Hungary | HU | 0.053 | EUR (€) |
| China | CN | 0.053 | EUR (€) |
| Finland | FI | 0.054 | EUR (€) |
| Slovakia | SK | 0.054 | EUR (€) |
| Palau | PW | 0.0546 | EUR (€) |
| Czech Republic | CZ | 0.055 | EUR (€) |
| France | FR | 0.056 | EUR (€) |
| Bosnia And Herzegovina | BA | 0.057 | EUR (€) |
| Luxembourg | LU | 0.058 | EUR (€) |
| Jersey | JE | 0.06 | EUR (€) |
| Malta | MT | 0.062 | EUR (€) |
| Micronesia Federated States Of | FM | 0.062 | EUR (€) |
| New Zealand | NZ | 0.063 | EUR (€) |
| India | IN | 0.065 | EUR (€) |
| Iceland | IS | 0.065 | EUR (€) |
| Saint Helena | SH | 0.065 | EUR (€) |
| Albania | AL | 0.0663 | EUR (€) |
| Venezuela | VE | 0.07 | EUR (€) |
| Moldova | MD | 0.07 | EUR (€) |
| South Africa | ZA | 0.07 | EUR (€) |
| San Marino | SM | 0.07 | EUR (€) |
| Paraguay | PY | 0.07 | EUR (€) |
| Cuba | CU | 0.072 | EUR (€) |
| Belgium | BE | 0.072 | EUR (€) |
| Germany | DE | 0.072 | EUR (€) |
| Bonaire Sint Eustatius and Saba | BQ | 0.073 | EUR (€) |
| Andorra | AD | 0.075 | EUR (€) |
| Argentina | AR | 0.076 | EUR (€) |
| Sao Tome And Principe | ST | 0.0768 | EUR (€) |
| Aland Islands | AX | 0.0772 | EUR (€) |
| Northern Mariana Islands | MP | 0.0772 | EUR (€) |
| Antarctica | AQ | 0.0772 | EUR (€) |
| Norfolk Island | NF | 0.0772 | EUR (€) |
| Niue | NU | 0.0772 | EUR (€) |
| Saint Barthelemy | BL | 0.0772 | EUR (€) |
| South Georgia And Sandwich Isl. | GS | 0.0772 | EUR (€) |
| Isle Of Man | IM | 0.0772 | EUR (€) |
| Wallis And Futuna | WF | 0.0772 | EUR (€) |
| Western Sahara | EH | 0.0772 | EUR (€) |
| Pitcairn | PN | 0.0772 | EUR (€) |
| Svalbard And Jan Mayen | SJ | 0.0772 | EUR (€) |
| Marshall Islands | MH | 0.0772 | EUR (€) |
| Bouvet Island | BV | 0.0772 | EUR (€) |
| Virgin Islands British | VG | 0.0772 | EUR (€) |
| Cocos (Keeling) Islands | CC | 0.0772 | EUR (€) |
| Virgin Islands U.S. | VI | 0.0772 | EUR (€) |
| Mayotte | YT | 0.0772 | EUR (€) |
| Holy See (Vatican City State) | VA | 0.0772 | EUR (€) |
| Saint Pierre And Miquelon | PM | 0.0772 | EUR (€) |
| United States Outlying Islands | UM | 0.0772 | EUR (€) |
| British Indian Ocean Territory | IO | 0.0772 | EUR (€) |
| French Southern Territories | TF | 0.0772 | EUR (€) |
| Christmas Island | CX | 0.0772 | EUR (€) |
| Guernsey | GG | 0.0772 | EUR (€) |
| Heard Island & Mcdonald Islands | HM | 0.0772 | EUR (€) |
| Dominican Republic | DO | 0.078 | EUR (€) |
| Tuvalu | TV | 0.078 | EUR (€) |
| Nicaragua | NI | 0.079 | EUR (€) |
| Monaco | MC | 0.079 | EUR (€) |
| French Polynesia | PF | 0.08 | EUR (€) |
| Montenegro | ME | 0.08 | EUR (€) |
| Liechtenstein | LI | 0.08 | EUR (€) |
| Saint Martin | MF | 0.08 | EUR (€) |
| Gibraltar | GI | 0.0814 | EUR (€) |
| Angola | AO | 0.082 | EUR (€) |
| Kiribati | KI | 0.083 | EUR (€) |
| Montserrat | MS | 0.084 | EUR (€) |
| Bulgaria | BG | 0.0847 | EUR (€) |
| Georgia | GE | 0.085 | EUR (€) |
| Netherlands | NL | 0.089 | EUR (€) |
| United Arab Emirates | AE | 0.089 | EUR (€) |
| Panama | PA | 0.089 | EUR (€) |
| Reunion | RE | 0.09 | EUR (€) |
| Falkland Islands (Malvinas) | FK | 0.091 | EUR (€) |
| Guadeloupe | GP | 0.092 | EUR (€) |
| Viet Nam | VN | 0.095 | EUR (€) |
| Mauritius | MU | 0.096 | EUR (€) |
| Djibouti | DJ | 0.096 | EUR (€) |
| Seychelles | SC | 0.0968 | EUR (€) |
| Oman | OM | 0.0968 | EUR (€) |
| New Caledonia | NC | 0.097 | EUR (€) |
| Bermuda | BM | 0.098 | EUR (€) |
| Anguilla | AI | 0.098 | EUR (€) |
| Aruba | AW | 0.101 | EUR (€) |
| Slovenia | SI | 0.1013 | EUR (€) |
| Saudi Arabia | SA | 0.105 | EUR (€) |
| Cook Islands | CK | 0.105 | EUR (€) |
| Cape Verde | CV | 0.106 | EUR (€) |
| Somalia | SO | 0.11 | EUR (€) |
| Burkina Faso | BF | 0.111 | EUR (€) |
| Guyana | GY | 0.111 | EUR (€) |
| Bolivia | BO | 0.1116 | EUR (€) |
| El Salvador | SV | 0.112 | EUR (€) |
| Saint Kitts And Nevis | KN | 0.112 | EUR (€) |
| Netherlands Antilles | AN | 0.115 | EUR (€) |
| Curacao - Curaçao | CW | 0.115 | EUR (€) |
| Mozambique | MZ | 0.1192 | EUR (€) |
| Fiji | FJ | 0.12 | EUR (€) |
| Guinea | GN | 0.12 | EUR (€) |
| Congo Democratic Republic | CD | 0.12 | EUR (€) |
| Ukraine | UA | 0.12 | EUR (€) |
| Antigua And Barbuda | AG | 0.12 | EUR (€) |
| Peru | PE | 0.121 | EUR (€) |
| Barbados | BB | 0.122 | EUR (€) |
| Honduras | HN | 0.1223 | EUR (€) |
| Turks And Caicos Islands | TC | 0.123 | EUR (€) |
| Philippines | PH | 0.123 | EUR (€) |
| Tonga | TO | 0.123 | EUR (€) |
| Vanuatu | VU | 0.123 | EUR (€) |
| Trinidad And Tobago | TT | 0.123 | EUR (€) |
| Jamaica | JM | 0.124 | EUR (€) |
| Cameroon | CM | 0.125 | EUR (€) |
| Grenada | GD | 0.125 | EUR (€) |
| Equatorial Guinea | GQ | 0.1253 | EUR (€) |
| Samoa | WS | 0.127 | EUR (€) |
| Saint Vincent And Grenadines | VC | 0.127 | EUR (€) |
| Armenia | AM | 0.129 | EUR (€) |
| Morocco | MA | 0.13 | EUR (€) |
| Guinea-Bissau | GW | 0.13 | EUR (€) |
| Maldives | MV | 0.1306 | EUR (€) |
| French Guiana | GF | 0.132 | EUR (€) |
| Guam | GU | 0.132 | EUR (€) |
| Kosovo | XK | 0.134 | EUR (€) |
| Iran Islamic Republic Of | IR | 0.1344 | EUR (€) |
| Tanzania | TZ | 0.135 | EUR (€) |
| Dominica | DM | 0.14 | EUR (€) |
| Serbia | RS | 0.1412 | EUR (€) |
| Israel | IL | 0.142 | EUR (€) |
| Gambia | GM | 0.142 | EUR (€) |
| Chad | TD | 0.1437 | EUR (€) |
| Benin | BJ | 0.145 | EUR (€) |
| Kenya | KE | 0.145 | EUR (€) |
| Mauritania | MR | 0.147 | EUR (€) |
| Timor-Leste | TL | 0.148 | EUR (€) |
| South Sudan | SS | 0.1483 | EUR (€) |
| Zimbabwe | ZW | 0.15 | EUR (€) |
| Sierra Leone | SL | 0.153 | EUR (€) |
| Suriname | SR | 0.154 | EUR (€) |
| Swaziland | SZ | 0.1543 | EUR (€) |
| Malaysia | MY | 0.155 | EUR (€) |
| Togo | TG | 0.1561 | EUR (€) |
| Congo | CG | 0.157 | EUR (€) |
| Nauru | NR | 0.1572 | EUR (€) |
| Mali | ML | 0.1573 | EUR (€) |
| Liberia | LR | 0.1579 | EUR (€) |
| Saint Lucia | LC | 0.158 | EUR (€) |
| Malawi | MW | 0.159 | EUR (€) |
| Senegal | SN | 0.159 | EUR (€) |
| Rwanda | RW | 0.16 | EUR (€) |
| Lao People's Democratic Republic | LA | 0.16 | EUR (€) |
| Gabon | GA | 0.1619 | EUR (€) |
| Jordan | JO | 0.1668 | EUR (€) |
| Nepal | NP | 0.1671 | EUR (€) |
| Lesotho | LS | 0.17 | EUR (€) |
| Qatar | QA | 0.17 | EUR (€) |
| Haiti | HT | 0.17 | EUR (€) |
| Martinique | MQ | 0.17 | EUR (€) |
| Kuwait | KW | 0.173 | EUR (€) |
| Cayman Islands | KY | 0.173 | EUR (€) |
| Belarus | BY | 0.1731 | EUR (€) |
| Uganda | UG | 0.1745 | EUR (€) |
| Mongolia | MN | 0.176 | EUR (€) |
| Zambia | ZM | 0.1772 | EUR (€) |
| Belize | BZ | 0.18 | EUR (€) |
| Cote D'Ivoire | CI | 0.18 | EUR (€) |
| Kazakhstan | KZ | 0.1829 | EUR (€) |
| Turkmenistan | TM | 0.184 | EUR (€) |
| Papua New Guinea | PG | 0.184 | EUR (€) |
| Egypt | EG | 0.185 | EUR (€) |
| Burundi | BI | 0.1863 | EUR (€) |
| Iraq | IQ | 0.1876 | EUR (€) |
| Bangladesh | BD | 0.189 | EUR (€) |
| Algeria | DZ | 0.19 | EUR (€) |
| Kyrgyzstan | KG | 0.192 | EUR (€) |
| Cambodia | KH | 0.1932 | EUR (€) |
| Lebanon | LB | 0.1953 | EUR (€) |
| Sudan | SD | 0.2 | EUR (€) |
| Ghana | GH | 0.2008 | EUR (€) |
| Eritrea | ER | 0.21 | EUR (€) |
| Ethiopia | ET | 0.2153 | EUR (€) |
| Russian Federation | RU | 0.22 | EUR (€) |
| Afghanistan | AF | 0.2211 | EUR (€) |
| Palestinian Territory Occupied | PS | 0.228 | EUR (€) |
| Azerbaijan | AZ | 0.23 | EUR (€) |
| Nigeria | NG | 0.23 | EUR (€) |
| Comoros | KM | 0.2306 | EUR (€) |
| Sri Lanka | LK | 0.231 | EUR (€) |
| Myanmar | MM | 0.24 | EUR (€) |
| Yemen | YE | 0.24 | EUR (€) |
| Niger | NE | 0.24 | EUR (€) |
| Uzbekistan | UZ | 0.24 | EUR (€) |
| Tunisia | TN | 0.245 | EUR (€) |
| Guatemala | GT | 0.25 | EUR (€) |
| Ecuador | EC | 0.25 | EUR (€) |
| Syrian Arab Republic | SY | 0.25 | EUR (€) |
| Libyan Arab Jamahiriya | LY | 0.2542 | EUR (€) |
| Pakistan | PK | 0.26 | EUR (€) |
| Indonesia | ID | 0.26 | EUR (€) |
| Madagascar | MG | 0.275 | EUR (€) |
| Tajikistan | TJ | 0.32 | EUR (€) |
| Bhutan | BT | 0.3406 | EUR (€) |
