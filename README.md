Logger
=============
    
Liste des caracteristiques :
============================

    - le Logger doit stocker et formatter des messages avec un niveau de gravité (INFO, WARNING, ...)
    - le Logger doit passer ces messages à un Handler
    - le Handler doit : suivant son comportement enregistrer les messages dans la DB, envoyer un mail, écrire dans un fichier ...
    on peut avoir un MysqlHandler, FileHandler, MailHandler ...

Division du problème en modules :
=================================

    - Logger : stocke et formatte les messages
    - Handler : s'occupe de la gestion des logs stockés par le Logger

Exigences :
===========
    -  Logger : class
        - attributs :
            - timestamp : datetime : je suis le timestamp du log
            - handlers : array : on est des Handlers et on s'occupe de handler le log
            - log : string : je suis le message qui va être handlé par les handlers  
        - comportements :
            - string public addWarning() : j'utilise le comportement de log () en interne avec un level WARNING
            - string public addError() : j'utilise le comportement de log () en interne avec un level ERROR
            - string public addCritical() : j'utilise le comportement de log () en interne avec un level CRITICAL
            - public addHandler(Handler handler) : j'ajoute des handlers
            - public process() : je prend tous les Handlers et je leur fais handler le log
            - string private log (message, context, application) : je formatte en interne le log qui sera passé au handler
             handle() le log
        - exceptions :
            - WIP
            
    - Handler : je suis une interface
        - comportement : 
            - handle(string log) : je prends le log du logger et je le handle 
        - exceptions :
            - WIP
    - MySQLHandler : class : je suis un Handler je prends le log et je l'enregistre dans la Mysql
    - FileHandler : class : je suis un Handler je prends le log et je l'enregistre dans un fichier
    - EmailHandler : class : je suis un Handler je prends le log et je l'envoie par mail