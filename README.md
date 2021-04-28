# Instruções

Para iniciar a aplicação é necessário apenas ter docker instalado.

Iniciar containers com:
```ssh
docker-compose up -d
```

Espere os containers serem iniciados e rode o comando para iniciar a migração do banco de dados:

```ssh
docker-compose run app composer start
```


Depois é só acessar a API pelas rotas:

http://localhost/api/clientes
http://localhost/api/projetos
