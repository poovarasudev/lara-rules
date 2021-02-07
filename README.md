# Lara Rules

This package provides a library of reusable request validation rules for your Laravel projects.

## Installation

Install the package using composer.

```bash
composer require poovarasudev/lara-rules
```

## Usage

As per the Laravel [documentation](https://laravel.com/docs/master/validation#using-rule-objects), simply use the respective rule as per the need.

If the validation fails, the package will respond with a localized error message. If the key does not exist, it will return hard-coded English language errors.

## Available rules

The following validation rules are currently available:

| Rules                  | Description                                                                                                           |
| --------------------- | --------------------------------------------------------------------------------------------------------------------- |
| AlphaSpaceDot        | Alpha, Space & Dot                                                  |
| CitizenIdentification              | Citizen check                                        |
| CountryCode              | Country Code                                        |
| DateAfterEqual              | Date After Or Equal                                        |
| DateBeforeEqual              | Date Before Or Equal                                        |
| Decimal              | Decimal                                        |
| DisposableEmail              | Disposable Email check on kickbox.com                                      |
| Domain              | Domain Name                                       |
| EvenNumber              | Even Number                                       |
| FileExists              | File Exists Or Not                                       |
| GreaterThan              | Greater Than                                       |
| HexColor              | Hex Color validation                                       |
| IMEINumber              | IMEI Number                                       |
| IsIPV4Address              | Is IPv4 Address                                       |
| IsIPV6Address              | Is IPv6 Address                                       |
| IsOldPassword              | Is Old Password of Auth User                                       |
| IsPrivateIpAddress              | Is Private Ip Address                                       |
| IsPublicIpAddress              | Is Public Ip Address                                       |
| LanguageCode              | Country based Language Code                                       |
| LatestAppVersion              | Is Latest App Version                                       |
| Latitude              | Latitude                                       |
| LocationCoordinates              | Location Coordinates                                       |
| Longitude              | Longitude                                       |
| LowerCase              | Lower Case                                       |
| MacAddress              | Mac Address                                       |
| MaxWords              | Max Words                                       |
| Missing              | Missing                                       |
| MonetaryFigure              | Monetary Figure                                       |
| MustBeWeekDay              | Must Be Week Day                                       |
| MustNotContainWords              | Must Not Contain Words                                       |
| OddNumber              | Odd Number                                       |
| PhoneNumber              | Phone Number                                       |
| RecordOwner              | Record Owner                                       |
| SmallerThan              | Smaller Than                                       |
| StrongPassword              | Strong Password                                       |
| TimeZone              | Time Zone                                       |
| TitleCase              | Title Case                                       |
| UpperCase              | Upper Case                                       |
| WithoutSpace              | Without Space                                       |


## Thank You !!!!!
