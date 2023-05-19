# Generate QR Code

Simple way to generate a QR code within a controller (TYPO3 CMS)

## What does it do?

Generates a QR code within a controller, saves the QR code in fileadmin folder and outputs the result in frontend.

You can set the target url and up to two different color options via FlexForms.

## Installation

Add via composer:

    composer require "passionweb/generate-qr-code"

* Install the extension via composer
* Flush TYPO3 and PHP Cache

## Requirements

This example uses the chillerlan/php-qrcode library for qr code generation.

Source: [chillerlan/php-qrcode library](https://github.com/chillerlan/php-qrcode "chillerlan/php-qrcode")

## Extension settings

There are no extension settings available.

## Troubleshooting and logging

If something does not work as expected take a look at the log file.
Every problem is logged to the TYPO3 log (normally found in `var/log/typo3_*.log`)

## Achieving more together or Feedback, Feedback, Feedback

I'm grateful for any feedback! Be it suggestions for improvement, requests or just a (constructive) feedback on how good or crappy this snippet/repo is.

Feel free to send me your feedback to [service@passionweb.de](mailto:service@passionweb.de "Send Feedback") or [contact me on Slack](https://typo3.slack.com/team/U02FG49J4TG "Contact me on Slack")
