# Binotel клиент для Yii2

## Установка

Рекомендуется установка через composer:

```
$ composer require denostr/yii2-binotel:"~0.1.0"
```

или добавить

```
"denostr/yii2-binotel": "~0.1.0"
```

в файл `composer.json`

## Подключение

Подключение компонента в конфиг проекта:

```
'components' => [
	...
	'binotel' => [
		'class' => 'denostr\Binotel\yii\Client',
		'key' => 'MY_KEY',
		'secret' => 'MY_SECRET',
	],
],
```

## Использование

```
try {
    $binotel = Yii::$app->binotel;
    $voiceFiles = $binotel->settings->listOfVoiceFiles();

    print_r($voiceFiles);

} catch (\denostr\Binotel\Exception $e) {
    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}
```
