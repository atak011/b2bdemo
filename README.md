# b2bdemo

# Giriş
B2B sistemi tedarikçilerinin sistem üzerinden sipariş oluşturup bunun görüntülenmesini sağlayan bir backend servisdir.


# Projeye Başlarken 

## Sistem gereksinimleri
PHP 7.4

SQLite

## Framework bağımlılıklarını yüklemek için
`composer install`


### SQLite Bug Hakkında

Sistemin kolay kurulup kullanılması için sqlite kullanılmıştır.Sqllite timestamp olarak tuttuğundan dolayı doctorine cast edememktedir.Bu yüzden 
shippingDate parametresi string olarak tutulmuştur.Production DB de bu sorun düzeltilecektir.


# POSTMAN COLLECTİON ANA DİZİNDE BULUNMAKTADIR


