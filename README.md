# Weather
[![CircleCI](https://circleci.com/gh/Northernberg/Weather.svg?style=svg)](https://circleci.com/gh/Northernberg/Weather)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Northernberg/Weather/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Northernberg/Weather/?branch=master)

[![Code Coverage](https://scrutinizer-ci.com/g/Northernberg/Weather/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Northernberg/Weather/?branch=master)

[![Build Status](https://scrutinizer-ci.com/g/Northernberg/Weather/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Northernberg/Weather/build-status/master)

# Install
To install with composer:
```
composer require guno17/weather
```
Copy config files:
```
rsync -av vendor/guno17/weather/config/di/curlwrap.php config/di
```
Copy view files:
```
rsync -av vendor/guno17/weather/view/ view/
```
Copy controller files:
```
rsync -av vendor/guno17/weather/src/ src/
```
