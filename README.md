# Collection

Pequeno projeto para gerenciar coleções usando PHP.

## O Projeto

Não é de hoje que várias extensões e módulos do PHP tem sua implementação discutida.
Com a crescente convergência entre o que as linguagens entregam alguns aspectos foram ficado cada vez mais evidentes.

As funções do PHP de manipulação de arrays estão sempre em algum lugar dessa discussão e a imutabilidade e a nomenclatura usadas estão entre os pontos mais discutidos.

Para ajudar a lidar com arrays e coleções no php apresentamos este pacote que pode ser muito útil.

### Pack

O pack é uma abstração do array que tem métodos que trabalham com imutabilidade e outros que modificam a estrutura do array.
Ele é útil para centralizar e encadear mutações no array original.

### Fetch

Temos pontos importantes a serem vistos quando o volume de dados gerenciados é grande.
O PHP suporta cargas incríveis em arrays associativos, mas o mesmo não ocorre quando os arrays são compostos por objetos.

## Como instalar

```bash
$ composer require php-brasil/collection
```

## Como usar

### Importar e sair usando

```php
require 'vendor/autoload.php';

use PhpBrasil\Collection\Pack;

$array = Pack::create([['name' => 'PHP']]);

foreach ($array as $item) {
    echo 'item ~> ', $item, ';', PHP_EOL;
}
# item ~> PHP;
```

### Utilizando os aliases

```php
require '/vendor/autoload.php';

use function PhpBrasil\Collection\pack;

$array = pack([['name' => 'PHP']]);
echo 'with-pluck ~> ', $array->pluck('name'), ';', PHP_EOL;
echo 'original ~> ', $array, ';', PHP_EOL;
# [
#     "PHP"
# ];
# [
#     [
#         "name" => "PHP"
#     ]
# ];
```

### Manipular arrays com operações comuns de arrays

```php
echo Pack::create(['A', '', 'C'])->filter();
# [
#   0 => "A",
#   2 => "C"
# ];
```

### Integrar com seu modelo de dados

```php
$statement = $pdo->prepare("SELECT id, name FROM users WHERE name = ?");
$statement->execute([get('name')]);
$users = Fetch::create($statement->fetchAll(PDO::FETCH_ASSOC), User::class);

$first = $users->current();
echo get_class($first);
echo $first->id;
# User
# 1
```
