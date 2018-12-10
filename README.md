# Weather
[![CircleCI](https://circleci.com/gh/canax/remserver.svg?style=svg)](https://circleci.com/gh/canax/remserver)
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
