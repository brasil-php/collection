# Collection

Pequeno projeto para gerenciar coleções usando PHP

## Como instalar

```bash
$ composer require php-brasil/collection
```

## Como usar

### Importar e sair usando

```php
require 'vendor/autoload.php'

use PhpBrasil\Collection\Pack;

$array = Pack::create([['name' => 'PHP']]);

foreach ($array as $item) {
    echo 'item ~> ', $item, ';', PHP_EOL;
}
# item ~> PHP;
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
