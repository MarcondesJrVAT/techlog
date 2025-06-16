# Techlog Serviços – Formulário de Contato

Repositório de exemplo de aplicação PHP para envio de e-mails via SMTP usando **PHPMailer** e **phpdotenv**, empacotado em contêiner Docker com Apache/PHP.

---

## Índice

- [Funcionalidades](#funcionalidades)  
- [Pré-requisitos](#pré-requisitos)  
- [Instalação](#instalação)  
- [Configuração de ambiente](#configuração-de-ambiente)  
- [Executando com Docker](#executando-com-docker)  
- [Estrutura de diretórios](#estrutura-de-diretórios)  
- [Como funciona](#como-funciona)  
- [Personalização](#personalização)  
- [Debug e logs](#debug-e-logs)  
- [Licença](#licença)  

---

## Funcionalidades

- Formulário de contato em **HTML/CSS** com Tailwind CSS  
- Envio de e-mail via SMTP usando [PHPMailer](https://github.com/PHPMailer/PHPMailer)  
- Carregamento seguro de variáveis de ambiente com [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)  
- Configuração em container Docker (PHP 7.1 + Apache)  
- Alertas de sucesso, erro e validação de campos  

---

## Pré-requisitos

- Docker ≥ 20.x  
- Docker Compose ≥ 1.27.x  
- Composer (para instalação local, opcional)  
- Git  

---

## Instalação

1. Clone este repositório:

   ```bash
   git clone https://github.com/MarcondesJrVAT/techlog.git
   cd techlog
   ```

2. Copie o arquivo de exemplo e ajuste suas credenciais de e-mail:

   ```bash
   cp .env.example .env
   ```

3. Edite o arquivo [`.env`](.env) com seu SMTP:

   ```ini
   MAIL_HOST=smtp.seuprovedor.com
   MAIL_PORT=587
   MAIL_USERNAME=seu-email@dominio.com
   MAIL_PASSWORD="sua-senha"
   ```

4. (Opcional) Instale dependências localmente para testes sem Docker:

   ```bash
   composer install
   ```

---

## Configuração de ambiente

- **.env**: contém as credenciais de SMTP.
- **php.ini**: ajustes de memória, `display_errors`, timezone em [`docker/php/php.ini`](docker/php/php.ini).
- **conf.conf**: configuração do VirtualHost Apache em [`docker/apache/conf.conf`](docker/apache/conf.conf).

---

## Executando com Docker

1. Construa e inicie o serviço:

   ```bash
   docker-compose up --build -d
   ```

2. Acesse no navegador:

   ```
   http://localhost:8084
   ```

3. Para parar e remover contêineres:

   ```bash
   docker-compose down
   ```

---

## Estrutura de diretórios

```text
.
├── .env                 # Variáveis de ambiente (não commitado)
├── .env.example         # Exemplo de configuração
├── docker-compose.yml   # Orquestração Docker
├── docker/
│   ├── apache/
│   │   └── conf.conf    # VirtualHost Apache
│   └── php/
│       ├── Dockerfile   # Imagem PHP/Apache
│       └── php.ini      # Configurações PHP
├── src/
│   └── config.php       # Lógica de envio de e-mail
├── vendor/              # Dependências Composer
├── index.php            # Formulário de contato
├── composer.json        # Dependências PHP
└── README.md            # Este arquivo
```

---

## Como funciona

1. O usuário preenche o formulário em [`index.php`](index.php).
2. Os dados são sanitizados e validados em [`src/config.php`](src/config.php).
3. As variáveis de SMTP são carregadas via [`Dotenv`](https://github.com/vlucas/phpdotenv).
4. O PHPMailer utiliza essas credenciais para enviar o e-mail.
5. Ao final, redireciona com parâmetro `status` para exibir alertas na página.

---

## Personalização

- **Layout**: adapte o HTML/Tailwind em [`index.php`](index.php).  
- **Logo e cores**: substitua links e classes CSS conforme a identidade visual.  
- **Assinatura de e-mail**: edite o bloco HTML em `$mail->Body` no arquivo [`src/config.php`](src/config.php).

---

## Debug e logs

- Exiba erros PHP em desenvolvimento ativando `display_errors` no [`php.ini`](docker/php/php.ini).  
- Logs de Apache em `/var/log/apache2/error.log` dentro do contêiner.  
- Para acessar o shell do container:

  ```bash
  docker exec -it php-apache bash
  ```

---

## Licença

Este projeto é distribuído sob a licença MIT. Consulte o arquivo [LICENSE](LICENSE) para mais detalhes.  
