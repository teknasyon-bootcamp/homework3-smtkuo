<?php
/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 *
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 *
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 *
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 *
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 *
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 *
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */

class Form
{
    public $fields = [];
    public $action = "";
    public $method = "";
    private function __construct(string $action, string $method) // createForm fonksiyonundan gelen parametreleri  property'lere aktarımı
    {
        $this->action = $action; 
        $this->method = $method;
    }
    public static function createPostForm(string $action, string $method = "POST") // method get post olmuşturulması
    { // createForm fonksiyonuna action method parametrelerini gönderilmesi
        return self::createForm($action, $method);
    }
    public static function createGetForm(string $action, string $method = "GET") // method get form olmuşturulması
    { // createForm fonksiyonuna action method parametrelerini gönderilmesi
		
        return self::createForm($action, $method);
    }
    public static function createForm(string $action, string $method) // form oluşturma fonksiyonu
    {
        return new static ($action, $method); // construct fonksiyonuna action method parametrelerinin gönderilmesi
    }
    public function addField(string $label="", string $name="", string $value=""):void // field dizisine veri ekleme
    {
		$this->fields[count($this->fields)-1] = array($label,$name,$value);  // addField fonksiyonuna gelen parametreleri fields dizisine aktarma
    }
    public function setMethod(string $method):void // method tipini değiştirme
    {
		$this->method=$method;
	}
	public function render():void // Ekrana fields dizisini foreach döngüsü ile yazdırma
	{
	echo '<form method="'.$this->method.'" action="'.$this->action.'">';
	foreach ($this->fields as $field) { 
	?>
	<!-- Fields dizisini Foreach döngüsü ile ekrana yazdırma -->
	<label for='<?= $field[1] ?>'><?= $field[0] ?> </label> <input type='text' name='<?= $field[1] ?>' value='<?= $field[2] ?>' />
	<?php 
	}
	echo "<button type='submit'>Gönder</button>"; 
    echo "</form><hr>"; 
	}
}

