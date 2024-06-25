
# Fehler #

## Fehlende Überprüfung der Einzigartigkeit der Nutzernamen ##

## Abbrechen funktioniert nicht ##

# Dokumentation #

- UML- welches?

# Features #

- PW- Überprüfung
- Logout
- Redirect

# Refactoring #

```php
if(!isset($_SESSION['site']) || $_SESSION['site'] != "loginApp"){
        $_SESSION = array();
    }
$_SESSION['site'] = "loginApp";
```
in Zeile 5 index.php hinzugefügt. Dient dazu die Sessions zwischen 2 Apps auseinanderzuhalten.
