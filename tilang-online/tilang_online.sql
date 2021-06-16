-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2021 pada 11.34
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tilang_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `question` varchar(10000) NOT NULL,
  `answer` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id_faq`, `question`, `answer`, `status`) VALUES
(1, 'Berapa biaya admin', '6500', 1),
(2, 'Test pertanyaan?', 'Test Jawaban update', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `police`
--

CREATE TABLE `police` (
  `kta` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `police`
--

INSERT INTO `police` (`kta`, `username`, `name`, `address`, `phone`, `gender`) VALUES
(1, 'police', 'police', 'police', 'police', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `ktp` bigint(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`ktp`, `username`, `name`, `address`, `phone`, `gender`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 1),
(3000000000000001, '3000000000000001', 'Profile Test', 'Profile Test', '3000000000000001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rules`
--

CREATE TABLE `rules` (
  `id_rule` int(11) NOT NULL,
  `article` varchar(256) NOT NULL,
  `detail` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rules`
--

INSERT INTO `rules` (`id_rule`, `article`, `detail`, `status`) VALUES
(1, 'Pasal 281', 'Setiap pengendara kendaraan bermotor yang tidak memiliki SIM dipidana dengan pidana kurungan paling lama 4 bulan atau denda paling banyak Rp 1 juta', 1),
(2, 'Pasal test edit', 'Pasal test edit', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` varchar(64) NOT NULL,
  `ktp` int(11) NOT NULL,
  `kta` int(11) NOT NULL,
  `article` varchar(256) NOT NULL,
  `nominal` varchar(256) NOT NULL,
  `date_create` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `ktp`, `kta`, `article`, `nominal`, `date_create`, `status`) VALUES
('T0001', 1, 1, 'Pasal 281, Pasal test edit', '100000', '2021-05-05', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_ticket` varchar(64) NOT NULL,
  `image` blob NOT NULL,
  `date_transaction` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_ticket`, `image`, `date_transaction`) VALUES
(3, 'T0001', 0xffd8ffe000104a46494600010101004800480000ffdb00430006040506050406060506070706080a100a0a09090a140e0f0c1017141818171416161a1d251f1a1b231c1616202c20232627292a29191f2d302d283025282928ffdb0043010707070a080a130a0a13281a161a2828282828282828282828282828282828282828282828282828282828282828282828282828282828282828282828282828ffc200110800ec00ec03012200021101031101ffc4001c0001010100030101010000000000000000000504010307060208ffc400160101010100000000000000000000000000000102ffda000c03010002100310000001f5218a00000000000000000000000000000000000000000000000074e428800000000124acc5b4000000019f4453f3b77885761593b1145a4516798a2d23705a44aa4aa93ac11f4ea905c000000031ece0c14215d3065b238e4000004aaa31ec7e495ae57d01c800000018b68ebec008000000000fce4da000000a0000800000000e39000000000a0000803e5e0fa1f4d6933c767642dd5bfabb478e7b1e6d204000000050000400042f0efe89f87d3c8bb3d17627d27d0f4f74b0aef4612a880000000a000080000000116cc5ab620000000280002000070728fb6b59d7136874eca080000000a00008000038e4000000000000a0000800000000000000000280002000000000000000000a0000800000000000000003ffc4002a10000202010206010305010000000000000203010400053006101213144011152270213132333460ffda0008010100010502fc38c60285376b38b759a85659d7b29b11b961a284d6abdccb1552e0a6c353b6edc93de9502577aac3728bfc8abb7abff8b96a71d02442033a8a673bb70f3b77cb3c6b339e1bb3c5b119daba39dcbc19f5001c5b01a3a7fddc99fc349fe9dbb69f22b51777eb65c51b92bd3d5131b2ca0823a8aec57cd41d2a5544c57adb8a28fa86f4fec5329b7b96152ec001586fcc7ce213d99ffaae237311a5f083da61cbac627933e617c30e796adea98898a10a4063804c7a74d8caf088e6b4ac0bd7d6ad1d3d3df65d60b00880b41b0cb5a6e4ccd16faec016058e1aac733c2e588e18541296095e3962e569ac23abeed2fd2e7bba67df1ee5f32e84ac54af60df6be506c38c32e984aba4bf3dff00ffc40014110100000000000000000000000000000070ffda0008010301013f0161ffc400161100030000000000000000000000000000115070ffda0008010201013f0160663fffc4003c1000020102020507080905000000000000010203001121310410124151132230407191d1233261627281a1b11424333442527073c160638292a2ffda0008010100063f02fd1cda91d5178b1b56cc53c6cdc0374c50c976198452d6eea3c8c81ad98de3a5795fcd517a13e9803cc7100e51fa056cbc6a68e8d3b16c2f1b9cc8e07d3d20d16362a2db52b0cc0e1efa09128451b857291f3271e6c833149211663811c0efe93d1b697ecda1ad2719c4c1fc7e15b4c405e26ad009273fda5bfc72ae668a89fb9278563a4409ecc57f99ae769d27f8a28afbfe91dcbe15cdd3a5f7a29fe2b9ba4c4dedc5e06b9d04320f51edf3afac47341edae1de2b6a37575e2a6f534c739243dc301f2d46a523cd333dbbfa4922cb696d48ed83e4c3830cf518d0a8dac09341a72da438df2e3f0cba2db553149f9e33b2692327688dfc75733190e0838b6ea8e218ec8cf8f4aff47e7237da91906f1e9f0ae574a1ccc91c64bdbd285db2b1fe2b667df415000a3203a8634421f25b97f2ff0055c8d0920921491b854f1392d1a588beed76da1dfadb673b6158b330653b773d58ab8054e60d6cc31aa2f051abca79bdb6ab1fa2fc2beaecb6e0ad71ad9a345566cc819f58925885df21e8abcf2bbf69d574254f1151c9362f88bf1d42ff0075736fdb3e1d60a380ca7020d5e191e2f4662b0d287fa55e6d219c70516a58e350a8b800353c6e2eac2c68093ed232636ed1d7b4e032e501ff0091d7a79f74b2923b32fe3ae88213e565c07aa379a58d3055161d67c9e8971eb4a057958b933ed5f56573c28bbe323667f8fd7cffc4002a10010001020405040300030000000000000111003121415161103071819140a1c1f070b1d160e1f1ffda0008010100013f21fc38f4c3202b67bc279cc230fdc041a74cac61d41c4e6dc31bed52cf2b99391aeade9508cb0b74d2b1aa2b6abec35cce62ec739d081c9c5d86ac0521828093ad26fa9a958164746b03c9ccb8379792e3b68a69303c9a70357480a4501c947d37acb4ebf187f752709d1bdd47d8d3b3c45474f64b0d1eeadbf03e68f3c5ff0060a3aa1a0518fcc762facf88c77c3e9ff69e612ee283a393e69487e8e079e112048330264675680d340e963c50020b69c946c3fd4460f7a7c4533d659e0e633f7a59f34e8593a99be798d61c22d06b239e4436e7cf72958c8c94cb7dabadb2a1130b730e9eadc3b3a0a21ab0080f4001008e08d642ac7cdb6db7f95dfa0c1238d4aa20a99332716402e8f1344494f545381e598f77bfa610290091ac45b4e009e105499cc27ad4d8a7a2cea7247fc838a7d99287abd44158844924c4d4d2bd63c541a1468eecb0d5df45db627809a5885cfb1d7ecfa83767018253bfae57c6a5d9eebfb42852f8df7a324190070941316cd225283aac4f721efeba3f2f264f5dfcb2f83eb4c8863c7d10f78a05618b63d4c9c392b0f606b1cfa703e4e188892c33a90c76c190dbf3e7ffda000c0301000200030000001004104104104104104104104104104104104104104104104104b0410410411490410410436a63c79c33f32810410415e903104104107a0410410510430c30c30c3cc70c70410430c30c30cb0c30e30c10410c38c3951a430c30c30410430c3b0f06d0c30c31c10410c30c30c33430c30d30410430c31c90e90c30c31c10410c30c38c30c30c30d30410430c30c30c30c30c30c10410c30c30c30c30c30c30410430c30c30c30c30c30fffc4001b11000202030100000000000000000000000111203021415060ffda0008010301013f10e889bcd0a606f92ef47d17ffc4001e11000201050101010000000000000000000011011030314041205060ffda0008010201013f10f82b4191085454e7b91cd5d1d267dcd86318f578842304cdc891c139d08c5fe7e0bfffc400291001000103020504020301000000000000011100213141611030517181204091b1a1d170c1f0f1ffda0008010100013f10fe1cb4c8920f2b4419d8187d8cbe39ada94c2cb35d200766f4ff00071311b23c873548484728260ddc1bb513ae2a2123ec022cc99bc41599869115a28badc44a9522952903b594dc0e47d2b15254fa6d0a8312f5702ec882e941aae230fdbbe5ab346b48d00b55b2488b49b83045da091b4731dd1157415c6d14ebdf804b80ce491db32bb51bbd91cdbadabf6f0c3d0291e1160d256121d70aff00c3a54db0dbedaab244a792add4fda3e949e77f12f21f5526446af7b43f1f2ab139d6bfd9ca5624c04f90ab6e581e9e2084f970c4d580f9a8048801b328a6d0e62432eb2c7e00351b1c75cc99e0c6c9c0df08fcf050895ed2877a7150322434e3c32de84800b0080a4f5c5a346af6e054eff860d2f3285214cc06acde35e01d0876b7b065d01690fc56672f992f9e6614c56c04b586210ca61309729e1a70d69a707ad1511d32d5f475c7d978d29a4645e4828512261e65cc2a5a6d086734c5dc497a20ec8a1340f607f1902447226a52360c205b971f59e0e2d63dfc7a23dde9cf99c7ae4ebed93bae110a43a4d89de9e983c48c15d1818fdf1d288c01f89e2f58586a141f340d466f212498481e63db40d3460f446cd5d11991965632f0eb6e25b34249b4d308658959796680108bc737028788e0e2f53e5d357aa33ee0deae702529a87dc53e47661c3b60782bfe0533fb9449d929ebb8421111eeebb949223429f77c9108e65609d23091edd379e58ac895204d998176b07cb5f714a88aaa401b14a9e288d3c68069c0ab225a843e75a512f866e07639423d5e79ae1a7618afa4f7d0e54fb3714f08a97514f925e7deb749c54e11fa096ea856cfd12083f07b85817a547ceb644eb60f2d2e8675376fec0e0d817662efa1bb8a70e303c1eaf07f2cae7971cf838a4951ca33efe3f8d7ffd9, '2021-05-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tutorial`
--

CREATE TABLE `tutorial` (
  `id_tutorial` int(11) NOT NULL,
  `id_bank` varchar(32) NOT NULL,
  `step` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tutorial`
--

INSERT INTO `tutorial` (`id_tutorial`, `id_bank`, `step`) VALUES
(1, 'ATM BCA', 'Masukkan kartu ATM BCA dan PIN ATM BCA Anda.\r\nPilih menu TRANSAKSI LAINNYA\r\nPilih menu TRANSFER\r\nPilih menu KE REK. BCA VIRTUAL ACCOUNT\r\nMasukkan nomor Virtual Account yang Anda terima (contoh: undefined), kemudian pilih BENAR\r\nMasukkan jumlah yang akan dibayarkan, selanjutnya tekan Benar\r\nValidasi pembayaran Anda. Pastikan semua detail transaksi yang ditampilkan sudah benar, kemudian pilih Ya\r\nPembayaran Anda telah selesai. Tekan Tidak untuk menyelesaikan transaksi, atau tekan Ya untuk melakukan transaksi lainnya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `type` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `type`, `active`) VALUES
('3000000000000001', '$2y$10$7T7oLpuZ9cmGKyx3aGDJF.oujpbNyagwrcWbo8b1HTboFWh6P/ki2', 3, 1),
('admin', '$2y$10$949siLTtaizCPrtf3oNNdeYXTvNozwH1qaKGveHic0gX3St5jnYcK', 1, 1),
('police', '$2y$10$W6.rYf8vsqo.9Sud2k1haeVHZ8wBTXuO9AL.Ept6u6ChHOjv9cj26', 2, 1),
('profile', '$2y$10$y/sZBN2Ai5F1TKERH053x.24fP0p5BZD1ZS3qxKRnWtF47.iy7fMu', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`kta`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ktp`);

--
-- Indeks untuk tabel `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indeks untuk tabel `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indeks untuk tabel `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id_tutorial`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id_tutorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
