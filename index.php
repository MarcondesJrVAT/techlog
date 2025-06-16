<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techlog Serviços - Seu parceiro em TI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {}
            }
        }
    </script>
</head>

<body class="font-sans antialiased text-gray-800">

    <!-- Header full-width -->
    <header class="bg-orange-500 w-full">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between">
            <img src="assets/images/logo-techlog-white.png" alt="TECHLOG Logo" class="h-12 sm:h-16 mb-4 sm:mb-0">
            <p class="text-white text-base md:text-lg lg:text-xl">
                Seu parceiro em Tecnologia de Informação
            </p>
        </div>
    </header>

    <!-- Banner full-width -->
    <div class="bg-yellow-200 text-black py-3 w-full">
        <div class="text-center">
            <span class="mx-2">&lt;=</span>Este site está em construção. Agradecemos sua compreensão<span class="mx-2">=&gt;</span>
        </div>
    </div>

    <!-- Conteúdo principal com container -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Seção Suporte -->
        <section class="py-12 bg-white">
            <div class="text-center md:text-left">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold mb-4">
                    Suporte Técnico, Manutenção e Soluções em TI
                </h2>
                <p class="mb-6 text-sm md:text-base">
                    Oferecemos serviços especializados para otimizar a infraestrutura de TI da sua empresa, garantindo
                    eficiência e segurança. Nossa equipe está pronta para atender suas necessidades com agilidade e
                    profissionalismo.
                </p>
                <a href="#contato"
                    class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded">
                    Fale Conosco
                </a>
            </div>
        </section>

        <!-- Seção Sobre -->
        <section class="py-12">
            <div class="flex flex-col lg:flex-row items-center gap-6 text-center lg:text-left">
                <img src="assets/images/logo-techlog-orange.png"
                    alt="TECHLOG Logo"
                    class="w-24 md:w-32 lg:w-40">
                <p class="text-gray-700 text-sm md:text-base">
                    A <strong>Techlog Serviços de Gestão e Sistemas Informatizados LTDA</strong> é uma empresa com ampla experiência em consultoria técnico-organizacional e gestão de mão de obra terceirizada. Desde 2000, tem participado de importantes projetos de informática aplicada na região Norte, atuando diretamente ou em parceria com instituições públicas e privadas. Destaca-se como integradora de talentos e soluções, promovendo inovação, pesquisa aplicada e desenvolvimento de tecnologias voltadas ao cotidiano da população.
                </p>
            </div>
        </section>

        <!-- Missão, Visão e Valores -->
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-center items-center gap-6">
                <!-- Card Missão -->
                <div class="group flex flex-col items-center justify-center text-center h-40 w-64 rounded-lg cursor-pointer transition-all duration-300 border border-gray-200 bg-white hover:bg-orange-500 relative overflow-hidden">
                    <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-300">
                        <p class="font-bold text-lg text-gray-800 group-hover:text-transparent transition-colors duration-300 z-10">Missão</p>
                        <p class="text-sm text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute inset-0 flex items-center justify-center px-4 z-20">Nossa missão é fornecer soluções inovadoras em TI, promovendo eficiência, segurança e crescimento sustentável para nossos clientes.</p>
                    </div>
                </div>
                <!-- Card Visão -->
                <div class="group flex flex-col items-center justify-center text-center h-40 w-64 rounded-lg cursor-pointer transition-all duration-300 border border-gray-200 bg-white hover:bg-orange-500 relative overflow-hidden">
                    <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-300">
                        <p class="font-bold text-lg text-gray-800 group-hover:text-transparent transition-colors duration-300 z-10">Visão</p>
                        <p class="text-sm text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute inset-0 flex items-center justify-center px-4 z-20">Ser referência em tecnologia e serviços de TI, reconhecida pela excelência, inovação e compromisso com resultados.</p>
                    </div>
                </div>
                <!-- Card Valores -->
                <div class="group flex flex-col items-center justify-center text-center h-40 w-64 rounded-lg cursor-pointer transition-all duration-300 border border-gray-200 bg-white hover:bg-orange-500 relative overflow-hidden">
                    <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-300">
                        <p class="font-bold text-lg text-gray-800 group-hover:text-transparent transition-colors duration-300 z-10">Valores</p>
                        <p class="text-sm text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute inset-0 flex items-center justify-center px-4 z-20">Ética, inovação, compromisso, respeito, transparência e foco no cliente.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulário de Contato -->
        <section id="contato" class="py-12">
            <div class="container mx-auto px-4 max-w-xl">
                <h4 class="text-2xl font-semibold mb-6">Pronto para otimizar sua TI? Fale conosco!</h4>

                <?php
                if (isset($_GET['status'])) {
                    $alerts = [
                        'sucesso'      => ['bg-green-100', 'border-green-500', 'text-green-700', 'Sua mensagem foi enviada com sucesso!'],
                        'erro'         => ['bg-red-100', 'border-red-500', 'text-red-700', 'Erro ao enviar. Tente de novo.'],
                        'campos_vazios' => ['bg-yellow-100', 'border-yellow-500', 'text-yellow-700', 'Preencha todos os campos.']
                    ];
                    $status = $_GET['status'];
                    if (isset($alerts[$status])) {
                        list($bg, $border, $text, $msg) = $alerts[$status];
                        echo "
                        <div class=\"flex items-center {$bg} border-l-4 {$border} p-4 mb-6\" role=\"alert\">
                          <p class=\"flex-1 {$text}\">{$msg}</p>
                          <button onclick=\"this.parentElement.remove()\" class=\"ml-4 font-bold text-xl leading-none {$text} hover:opacity-75 focus:outline-none\">&times;</button>
                        </div>
                      ";
                    }
                }
                ?>

                <form action="src/config.php" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium">Nome:</label>
                        <input type="text" id="name" name="name" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium">E-mail:</label>
                        <input type="email" id="email" name="email" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium">Assunto:</label>
                        <select id="subject" name="subject" required class="w-full border rounded px-3 py-2">
                            <option value="">Selecione um assunto</option>
                            <option>Suporte Técnico</option>
                            <option>Manutenção</option>
                            <option>Soluções em TI</option>
                            <option>Outros Assuntos</option>
                        </select>
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium">Conteúdo:</label>
                        <textarea id="content" name="content" rows="6" required class="w-full border rounded px-3 py-2"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded">Enviar Mensagem</button>
                </form>
            </div>
        </section>

    </main>

    <!-- Footer full-width -->
    <footer class="bg-orange-500 text-white py-6 w-full">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row md:justify-between gap-6 text-center md:text-left">
            <div>
                <p class="font-semibold">TECHLOG SERVIÇOS DE GESTÃO E SISTEMAS INFORMATIZADOS LTDA.</p>
                <p>Rua Pedrarias de Avilar, 26 - CONJ. 31 DE MARÇO TÉRREO SALA 01</p>
                <p>MANAUS / AM / 69077-450</p>
                <p>CNPJ: 03.613.289/0001-02</p>
            </div>
            <div>
                <p>Tel: (92) 3306-4410 / 3306-4403</p>
                <p>
                    E-mail:
                    <a href="mailto:contato@techlog.com.br" class="underline break-all hover:text-yellow-200 transition-colors">
                        contato@techlog.com.br
                    </a>
                </p>
            </div>
        </div>
        <div class="text-center mt-4 text-sm">
            &copy; <?php echo date('Y'); ?> Techlog. Todos os direitos reservados.
        </div>
    </footer>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const alertBox = document.querySelector('[role="alert"]');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.remove();
                }, 5000);
            }
        });
    </script>

</body>

</html>