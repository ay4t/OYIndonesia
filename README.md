# OYIndonesia
 Modul PHP untuk integrasi gateway pembayaran dengan OYIndonesia

Contoh Penggunaan:
```
$request    = new \ay4t\OYIndonesia\CreateVA();
// $request->setApiKey('your_api_key');
$request->setIsProduction(false);

$result     = $request
    ->setPartner_user_id('123123123')
    ->setBankCode('014')
    ->setAmount(50000)
    ->setUserEmail('kawoel@gmail.com')
    ->setUserName('aahadr')
    ->setTrxID('asdasdjasdjasdasd')
    ->send();

var_dump($result);
```
