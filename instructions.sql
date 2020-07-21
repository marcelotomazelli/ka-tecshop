PHP MySQL

create database `db_ka`

-- selecionando operação no menu, alterei o agrupamento para 'utf8mb4_unicode_ci'

create table `tb_produtos`(
	`id_produto` int not null primary key auto_increment,
	`nome` varchar(250) not null,
	`nome_curto` varchar(20) not null,
	`valor` float(11,2) not null,
	`descricao` text null
);

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`, `descricao`) values (
		'Headset Gamer HyperX Cloud II 7.1 - KHX-HSCP-GM - Preto', 
		'HyperX Cloud II', 
		599.90,
		'Com o Headset Gamer HyperXCloud II Preto você tem a garantia de uma excelente experiência de jogo. Ele possui dispositivo de controle avançado de áudio, conexão USB e design inovador, que permite que o som e a voz sejam amplificados. Você poderá ouvir sons que antes eram imperceptíveis! Para intensificar sua experiência, a linha conta com tecnologia de som surround 7.1 que garante sua imersão no jogo, filme ou música. Este headset é sinônimo de controle absoluto. Ajuste o volume do áudio e também do microfone: você também pode alternar de forma facilitada o som surround 7.1, desligar e ligar. Além desse poderoso controle de som, o HyperX®Cloud II é Plug & Play e não necessita de instalação de qualquer driver. A tecnologia presente no microfone permite o cancelamento de ruídos e a ampliação automática através de um dispositivo de áudio USB. Resultado: voz nítida, clara, redução de ruídos no ambiente e aumento automático do volume à medida que o som no jogo fica mais alto. Isso garante comunicação otimizada com sua equipe durante as batalhas. O HyperX®Cloud II também é certificado pela Teamspeak, confirmando sua extrema qualidade para uso no Skype, entre outros programas de chat. Mesmo com tudo isso, não poderia faltar conforto. Ele possui arco 100% em espuma memory foam e almofadas de couro sintético para seu conforto absoluto, além de boa compatibilidade: conectividade USB para PC e Mac, Ps4, Xbox One1 (será necessário adaptador, vendido separadamente) e dispositivos móveis. Seu headset terá garantia de 2 anos e suporte técnico local gratuito.');

-- ============================================== --

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`, `descricao`) values (
		'Notebook Gamer Asus AMD Ryzen 5 3500U, 8GB, 1TB, NVIDIA GTX1050 4GB, Windows 10 Home, 15.6´, Preto/Azul - M570DD-DM122T', 
		'Notebook Gamer Asus', 
		5052.53,
		'No coração do M570 está o poderoso processador AMD Ryzen 5 3500 para multitarefas sem esforço, e gráficos NVIDIA GeForce GTX 1050 para jogos com visuais perfeitos.');

-- ============================================== --

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`, `descricao`) values (
		'Smartphone Samsung Galaxy A51, 128GB, 48MP, Tela 6.5´, TV Digital, Preto - SM-A515FZKBZTO', 
		'Samsung Galaxy A51', 
		1999.89,
		'O A51 possui um Display Infinito Full HD+ de 6.5" com tecnologia Super AMOLED, para você poder jogar, assistir, navegar e nos seus conteúdos favoritos sem interrupções. Aproveite um smartphone que minimiza as bordas e maximiza cada centímetro da tela. O padrão moderno do design do A51 vem em tons suaves e elegantes, incluindo preto, branco e azul. Um acabamento brilhante adiciona o toque perfeito de estilo ao design fino e elegante, com a combinação perfeita de estilo e conforto. Tire fotos nítidas de alta resolução com a câmera principal de 48MP, tanto de dia quanto de noite. Uma câmera Ultra Wide de 123° fotografa imagens mais amplas. Escolha a câmera Macro de 5 MP para tirar fotos de perto com alta definição, e destaque o objeto com os vários efeitos de Foco Dinâmico da câmera de profundidade de 5 MP.');

-- ============================================== --

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`, `descricao`) values (
		'Teclado Mecânico Gamer HyperX Alloy Origins Core, RGB, Switch HyperX Red, ABNT2 - HX-KB7RDX-BR', 
		'Alloy Origins Core', 
		579.90,
		'O HyperX Alloy Origins Core é um teclado ultracompacto e resistente com switches exclusivos HyperX projetados para proporcionar aos gamers a melhor combinação de estilo, desempenho e confiabilidade. Os switches possuem LEDs aparentes para uma iluminação deslumbrante com uma pressão de atuação e distância de curso elegantemente equilibradas para melhor resposta e precisão. O Alloy Origins Core possui uma estrutura totalmente em alumínio para estabilidade, três níveis de inclinação customizáveis em um formato elegante. O design compacto TKL (Ten Key Less), sem o teclado numérico, ajuda a aumentar o espaço para movimentos do mouse em setups com espaço limitado, o cabo dele é USB tipo-C removível para máxima portabilidade.');

-- ============================================== --

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`, `descricao`) values (
		'iPhone 11 Pro Dourado, 512GB - MWCF2', 
		'iPhone 11 Pro', 
		7349.90,
		'Revolucionário sistema de câmera tripla que amplia possibilidades sem abrir mão da simplicidade. Um salto sem precedentes em duração de bateria. Chip assustadoramente potente que melhora ainda mais o aprendizado de máquina e redefine o que um smartphone pode fazer. Conheça o primeiro iPhone poderoso o suficiente para ser chamado de Pro. Maior campo de visão. O iPhone 11 Pro permite que você use o zoom para afastar a imagem, indo da câmera teleobjetiva até a nova ultra-angular, com um impressionante alcance de zoom óptico de 4x. Interface elegante e envolvente. Aproveitamos o campo de visão mais amplo para mostrar também o que está fora de quadro (e, para enquadrar tudo, basta um toque). É como estar dentro da cena. Entre você e a foto, só a elegante fonte Pro da nova interface da câmera. Grave ví­deos lindos, com movimento natural e imagens realistas, cheias de detalhes. O poder de processamento quase surreal do iPhone 11 Pro permite gravar em 4K a 60 qps, com alcance dinâmico estendido e estabilização cinemática de ví­deo. Você também tem mais controle criativo, com um campo de visão quatro vezes mais amplo e poderosas ferramentas de edição. Não coube tudo na foto? Afaste o zoom. A câmera ultra-angular captura um campo de visão quatro vezes maior. É como dar um passo para trás ? bem para trás ? sem se mexer. Cordilheiras, catedrais imponentes, arranha-céus e todos os membros da sua família entram no enquadramento sem você ter que pedir para eles se juntarem só um pouquinho mais.');

-- ============================================== --

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`, `descricao`) values 
		'Gabinete Gamer Sharkoon LIT200, Mid Tower, RGB, com FAN, Lateral em Vidro - LIT200', 
		'Gabinete Sharkoon', 
		399.90,
		'O Gabinete RGB LIT 200 é uma torre midi ATX que além de oferecer uma iluminação eficaz também direciona o RGB por todo o gabinete: por dentro e por fora do painel lateral em vidro temperado. Uma ventoinha endereçável localizada na parte traseira e uma tira de LED junto com outra tira endereçável na parte frontal do gabinete fornecem uma iluminação atmosférica para o seu hardware. As luzes se refletem e atendem a um padrão reflexivo de ondas impressas no painel frontal de vidro temperado. Com um total de seis opções de montagem para ventoinhas, e espaço suficiente para radiadores, hardware e até seis SSDs, o gabinete oferece estilo e qualidade.');

-- ============================================== --

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`) values (
		'Computador HP Pro G2 Intel Core i5-8400, 4GB, 500GB, FreeDos - 7PH90LA#AC4', 
		'Computador HP Pro G2', 
		2420.95);

-- ============================================== --

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`, `descricao`) values (
		'MacBook Air Apple Intel Core i5 Dual Core, 8GB, SSD 128GB, macOS Sierra, 13.3´, Branco - MQD32BZ/A', 
		'MacBook Air Apple', 
		7599.90,
		'O MacBook Air vem com processador Intel Core i5 Dual Core de quinta geração, que consome menos energia e garante maior desempenho. Com tecnologia Wi-Fi que opera com tecnologia ultrarrápida e alcance muito maior. O armazenamento em flash não só deixa o MacBook mais leve, mas também mais rápido que um disco rígido de 5400 RPM. A tela do MacBook Air possui apenas 4,86 milímetros de espessura e retroiluminação por LED que deixa as cores muito mais vibrantes, perfeita para assistir filmes. Aproveite o melhor de um notebook super potente, compacto, com teclado retroiluminado para que possa digitar com conforto em ambientes com pouca luz.');

-- ============================================== --

insert into `tb_produtos`(`nome`, `nome_curto`, `valor`, `descricao`) values (
		'Smartphone Samsung Galaxy S10, 128GB, 16MP, Tela 6.1´, Branco - SM-G973F/1DL', 
		'Samsung Galaxy S10', 
		2999.90,
		'Completamente reprojetado para remover interrupções da sua visualização. Sem distrações, sem interrupções. O corte a laser preciso, o desbloqueio na tela e o Dynamic AMOLED agradável aos olhos fazem do Display Infinity-O a tela mais inovadora em um Galaxy até agora. Capture o mundo mais amplo. Use a câmera ultra-ampla para tirar fotos impressionantes e cinematográficas com um campo de visão de 123 graus.');

