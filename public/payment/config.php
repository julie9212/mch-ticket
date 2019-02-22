<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091500516771",

		//商户私钥
		'merchant_private_key' => "MIIEogIBAAKCAQEAyhY+/3YcVjOMVQNbvd4MTMmGZMFH50naHBKV0CJlcc5fxZaDCchvAbFB4N0mEK63IDgf9Ghc03c9gY3XgsbzHiBwPrbUo/FookADFC9AgQ8iFFXQ39fHE2YQE0ZdtNaNcO3eedNKq9xIJ2nksqJTOMaCG5gkEZImroZVDdRAd0IdyfIhDbcPAqFoSLgHHoLSIVVFb5kXpoKlxcSzceeU1OykcyJRlDQWEz2ORFHtLT/cRw3LGm4Cbc/veOhq9C9Z4cF9+CJbkydAP+z/r+9DNVleuTmgEmRZEww7QIzbmXmx8FCrS1X7Ghrq58JMrWHO9AFfZIuquGKf5EheXDn25QIDAQABAoIBADEHTKl14lIXl4hYlD1wTdOjYPO44NUAWeZNrAMfFTWTODEb3xbUhfoHI1CG1uFdQhiTBU2qtDqpx0ZTP2H/GqTIgfL1MInF2/jhRt3yyNeG8GG2oEJue2H9dRD4FWv2UcKAM2WjGY6wluDZFB8yurYfkxlWxAlvR+s3tBLy1+EWvqGB2HvR1JtHYoOr4pv2tqbzNnz6SsiCBWZ03QBE85FoMvW/mwqhCqRT3tYHq9VKDcrWKEQm/K1MVo4oj6cGAi++67vk9mWpgaVd8BO+ctU4RMy/9KoQPJbrGzrgJfb7Du7Y0O9nT+8TFrz5S8hnqlxeE/6xv0t+f2ZAxCe1Q1ECgYEA9pRU/ExN8uYsW0i5ByYSDHQ1o5QooHFbJ7aZXYcqtrxKRRIrh6oH4Z/tTC9QL3aLvY62sk6ft1lvWxjw0nYF4T6cwl3KucZQVXWYLVb6WtJdZqGwgh8SHWtdh6zx7XefNfu01IfxP7RkbdBJhFT899XldIaF4CY+/zaj3kBw2C8CgYEA0c7BXsFfkkWcTrSrwU8rXlkMWk2MSpiULFMkUxCjsFUcqsND7iMq5XiN1ySuPtNElvH7NXuCBwBlaYHK74He36cu2jaSVIoOQANVkj1qh5hS8cObYnE2sMCccONYdAoCD5mMMU9FkmYdcGdEFtMW7uGxQtQkF8T9AQMqnLIUCSsCgYB3JTdnbatgig220g3twVyJPgHJF8cFt6BXMSksAysFfzfX5i64b9U9FVzBKj9xn7NoFbR7tfgAzSs8dnGvEC5JJ0rxtAZH++ZHVPoCNnvkNK/C7q/uP/st0fowm8WOe/WnTQeUhldw88ZvNWzAj5xoWKd1xaacp35bLVjDBJpCKwKBgBFIvidnOM9dCrZ1Ld0b/4+jOGBMGS2gCjzokIqDSWjiah0rPvJkVUlYOB8sN2qXjwP8ZVyPkzOudaxOdABtK4YzSKnTaxSp1uixHaCRjLAk/VhLbAadGwtOotSt9gCBPpA4bxM0259m6C/1Yeebdj0xvJ+ryFlo8greTulfxkTHAoGAIs2TbpYvpbntgzbXXEJp0oyiiplhqJmGt6JAKtk3qQcdM4rPnCdS34E52zcz2hKHRw957TVIqyXe3yrI7AB+eHOmJmyDHz0D2iVtL2T20ZZa7almF8in88zD2otEbKV1ABgL+b0cVGRlq/jZQQczjdsn/++HU7CgKaZBSb/ge+g=",
		
		//异步通知地址
		'notify_url' => "http://www.mch.com/suc",
		
		//同步跳转
		'return_url' => "http://www.mch.com/suc",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuKf3eKuko2S4PZJUqDK7HrjSoFhK2pWnGgBelB12LE+qPWblBF0vWPoW1jFPW2thgJWQhn+Entgf7pm2/K4ymi8RJYtBh+Bc2DwLmyYSeZHsM9uzwFxYNQr5aw4wK1bzw/jfoddEFtTs+kkfp33w6pauGqN8/3aZ8l7yBZ3KHFUs2tEe4iFK+MVt4Z3bnyCk/2VJO+5+xuoAHfWTXYIxmxVUsvoW13zoC/jr303JmxXo6ZwQSC/FJczrtMfxXledhBGGYrkbWZ6IkzhW/92lM0Y0iSXcBmpmHm3Zmj4fPIyEawJLznnq++2oKYENB+mrhDP7B+LhM3OXNrrgDk678QIDAQAB",
);