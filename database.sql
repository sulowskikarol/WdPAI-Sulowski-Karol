/*
 Navicat Premium Data Transfer

 Source Server         : WDPAI
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : db
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 25/01/2024 16:48:57
*/


-- ----------------------------
-- Sequence structure for kategorie_kont_kategoria_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."kategorie_kont_kategoria_id_seq";
CREATE SEQUENCE "public"."kategorie_kont_kategoria_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for kategorie_rowerow_kategoria_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."kategorie_rowerow_kategoria_id_seq";
CREATE SEQUENCE "public"."kategorie_rowerow_kategoria_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for konta_details_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."konta_details_id_seq";
CREATE SEQUENCE "public"."konta_details_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for konta_konta_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."konta_konta_id_seq";
CREATE SEQUENCE "public"."konta_konta_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for rezerwacje_serwis_rezerwacja_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."rezerwacje_serwis_rezerwacja_id_seq";
CREATE SEQUENCE "public"."rezerwacje_serwis_rezerwacja_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for rowery_rower_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."rowery_rower_id_seq";
CREATE SEQUENCE "public"."rowery_rower_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for wypozyczenia_rowery_wypozyczenia_rowery_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."wypozyczenia_rowery_wypozyczenia_rowery_id_seq";
CREATE SEQUENCE "public"."wypozyczenia_rowery_wypozyczenia_rowery_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for wypozyczenia_wypozyczenie_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."wypozyczenia_wypozyczenie_id_seq";
CREATE SEQUENCE "public"."wypozyczenia_wypozyczenie_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for kategorie_kont
-- ----------------------------
DROP TABLE IF EXISTS "public"."kategorie_kont";
CREATE TABLE "public"."kategorie_kont" (
  "kategoria_id" int4 NOT NULL DEFAULT nextval('kategorie_kont_kategoria_id_seq'::regclass),
  "nazwa_kategorii" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of kategorie_kont
-- ----------------------------
INSERT INTO "public"."kategorie_kont" VALUES (1, 'user');
INSERT INTO "public"."kategorie_kont" VALUES (2, 'admin');

-- ----------------------------
-- Table structure for kategorie_rowerow
-- ----------------------------
DROP TABLE IF EXISTS "public"."kategorie_rowerow";
CREATE TABLE "public"."kategorie_rowerow" (
  "kategoria_id" int4 NOT NULL DEFAULT nextval('kategorie_rowerow_kategoria_id_seq'::regclass),
  "nazwa_kategorii" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "sciezka_zdjecia" varchar(250) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of kategorie_rowerow
-- ----------------------------
INSERT INTO "public"."kategorie_rowerow" VALUES (1, 'Miejskie', 'miejskie.webp');
INSERT INTO "public"."kategorie_rowerow" VALUES (2, 'Elektryczne', 'elektryczne.webp');
INSERT INTO "public"."kategorie_rowerow" VALUES (3, 'Górskie', 'górskie.webp');
INSERT INTO "public"."kategorie_rowerow" VALUES (4, 'Dziecięce', 'dziecięce.webp');
INSERT INTO "public"."kategorie_rowerow" VALUES (5, 'Szosowe', 'szosowe.webp');
INSERT INTO "public"."kategorie_rowerow" VALUES (6, 'Gravelowe', 'gravelowe.webp');

-- ----------------------------
-- Table structure for konta
-- ----------------------------
DROP TABLE IF EXISTS "public"."konta";
CREATE TABLE "public"."konta" (
  "konta_id" int4 NOT NULL DEFAULT nextval('konta_konta_id_seq'::regclass),
  "email" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "haslo" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "id_konta_details" int4,
  "id_kategorie_kont" int4 NOT NULL DEFAULT 1
)
;

-- ----------------------------
-- Records of konta
-- ----------------------------
INSERT INTO "public"."konta" VALUES (3, 'karol.sulowski@student.pk.edu.pl', '$2y$10$KirRQEXkYYJtHrGQQQ2P2uY/i0JtT8kD07AKmail0Ref5rvGpf2/u', 9, 2);
INSERT INTO "public"."konta" VALUES (2, 'john.snow@pk.edu.pl', '$2y$10$jonmH1IXgD/5K4re2gyzKuRqm8AU/gf0N8UFUOPXtUAKPhRftL/wq', 10, 1);

-- ----------------------------
-- Table structure for konta_details
-- ----------------------------
DROP TABLE IF EXISTS "public"."konta_details";
CREATE TABLE "public"."konta_details" (
  "id" int4 NOT NULL DEFAULT nextval('konta_details_id_seq'::regclass),
  "imie" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "nazwisko" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "telefon" varchar(20) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of konta_details
-- ----------------------------
INSERT INTO "public"."konta_details" VALUES (9, 'Karol', 'Sulowski', '695480567');
INSERT INTO "public"."konta_details" VALUES (10, 'John', 'Snow', '123456789');

-- ----------------------------
-- Table structure for rezerwacje_serwis
-- ----------------------------
DROP TABLE IF EXISTS "public"."rezerwacje_serwis";
CREATE TABLE "public"."rezerwacje_serwis" (
  "rezerwacja_id" int4 NOT NULL DEFAULT nextval('rezerwacje_serwis_rezerwacja_id_seq'::regclass),
  "konta_id" int4,
  "data_rezerwacji" date NOT NULL,
  "termin_dostarczenia" date NOT NULL,
  "notatka_od_klienta" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "zdjecie" varchar(100) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of rezerwacje_serwis
-- ----------------------------
INSERT INTO "public"."rezerwacje_serwis" VALUES (13, 2, '2024-01-21', '2024-01-22', 'Przeskakuje łańcuch, trzeba wymienić kasetę.', '');
INSERT INTO "public"."rezerwacje_serwis" VALUES (14, 3, '2024-01-21', '2024-01-24', 'Standardowy przegląd, smarowanie łańcucha itd.', '');

-- ----------------------------
-- Table structure for rowery
-- ----------------------------
DROP TABLE IF EXISTS "public"."rowery";
CREATE TABLE "public"."rowery" (
  "rower_id" int4 NOT NULL DEFAULT nextval('rowery_rower_id_seq'::regclass),
  "model" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "rozmiar" varchar COLLATE "pg_catalog"."default",
  "kategoria_id" int4,
  "firma" varchar(40) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of rowery
-- ----------------------------
INSERT INTO "public"."rowery" VALUES (1, 'City Bike 100', 'M', 1, 'BikeCo');
INSERT INTO "public"."rowery" VALUES (2, 'Electric Cruiser 2000', 'L', 2, 'EcoRides');
INSERT INTO "public"."rowery" VALUES (3, 'Mountain Trailblazer X', 'XL', 3, 'Adventure Cycles');
INSERT INTO "public"."rowery" VALUES (4, 'Kids Explorer 300', 'S', 4, 'TinyBikes');
INSERT INTO "public"."rowery" VALUES (5, 'Road Master Pro', 'M', 5, 'SpeedyCycles');
INSERT INTO "public"."rowery" VALUES (6, 'Gravel Adventure 500', 'L', 6, 'OffRoadExplorers');
INSERT INTO "public"."rowery" VALUES (7, 'City Commuter 300', 'L', 1, 'UrbanRide');
INSERT INTO "public"."rowery" VALUES (8, 'Electric City Explorer', 'M', 2, 'GreenWheels');
INSERT INTO "public"."rowery" VALUES (9, 'Mountain Beast Pro', 'XXL', 3, 'ExtremeRides');
INSERT INTO "public"."rowery" VALUES (10, 'Kids Fun Rider', 'XS', 4, 'PlayfulBikes');
INSERT INTO "public"."rowery" VALUES (11, 'Road Speedster 800', 'S', 5, 'VelocityCycles');
INSERT INTO "public"."rowery" VALUES (12, 'Gravel Voyager 700', 'XL', 6, 'TrailBlazers');
INSERT INTO "public"."rowery" VALUES (13, 'City Glide 200', 'S', 1, 'SwiftCycles');
INSERT INTO "public"."rowery" VALUES (14, 'Electric Trail Seeker', 'L', 2, 'PowerRides');
INSERT INTO "public"."rowery" VALUES (15, 'Mountain Explorer GT', 'XL', 3, 'PeakAdventures');
INSERT INTO "public"."rowery" VALUES (16, 'Kids Adventure Seeker', 'M', 4, 'YoungExplorers');
INSERT INTO "public"."rowery" VALUES (17, 'Road Prodigy X', 'M', 5, 'HighSpeedBikes');
INSERT INTO "public"."rowery" VALUES (18, 'Gravel Roadster 600', 'L', 6, 'AdventureWheels');
INSERT INTO "public"."rowery" VALUES (19, 'City Pro 400', 'M', 1, 'CityRides');
INSERT INTO "public"."rowery" VALUES (20, 'Electric Trekker 1200', 'L', 2, 'EcoExplorers');
INSERT INTO "public"."rowery" VALUES (21, 'Mountain Fury Pro', 'XXL', 3, 'WildRides');
INSERT INTO "public"."rowery" VALUES (22, 'Kids Dream Rider', 'XS', 4, 'HappyPedals');
INSERT INTO "public"."rowery" VALUES (23, 'Road Sprinter 1000', 'S', 5, 'SwiftSpeed');
INSERT INTO "public"."rowery" VALUES (24, 'Gravel Nomad 800', 'XL', 6, 'PathFinders');
INSERT INTO "public"."rowery" VALUES (25, 'City Express 150', 'S', 1, 'SwiftMoves');
INSERT INTO "public"."rowery" VALUES (26, 'Electric Journey 1800', 'L', 2, 'EcoJourneys');
INSERT INTO "public"."rowery" VALUES (27, 'Mountain Summit X', 'XL', 3, 'PeakSummit');
INSERT INTO "public"."rowery" VALUES (28, 'Kids Joy Rider', 'M', 4, 'JoyfulBikes');
INSERT INTO "public"."rowery" VALUES (29, 'Road Lightning 1200', 'M', 5, 'FlashCycles');
INSERT INTO "public"."rowery" VALUES (30, 'Gravel Explorer 900', 'L', 6, 'TrailSeekers');
INSERT INTO "public"."rowery" VALUES (31, 'City Navigator 300', 'M', 1, 'UrbanNavigators');
INSERT INTO "public"."rowery" VALUES (32, 'Electric Adventure 1600', 'L', 2, 'EcoAdventures');
INSERT INTO "public"."rowery" VALUES (33, 'Mountain Extreme Pro', 'XXL', 3, 'ExtremeAdventures');
INSERT INTO "public"."rowery" VALUES (34, 'Kids Happy Rider', 'XS', 4, 'HappyAdventures');
INSERT INTO "public"."rowery" VALUES (35, 'Road Velocity 1500', 'S', 5, 'VelocityAdventures');
INSERT INTO "public"."rowery" VALUES (36, 'Gravel Trekker 750', 'XL', 6, 'TrailExplorers');

-- ----------------------------
-- Table structure for wypozyczenia
-- ----------------------------
DROP TABLE IF EXISTS "public"."wypozyczenia";
CREATE TABLE "public"."wypozyczenia" (
  "wypozyczenie_id" int4 NOT NULL DEFAULT nextval('wypozyczenia_wypozyczenie_id_seq'::regclass),
  "konta_id" int4,
  "data_wypozyczenia" date NOT NULL,
  "data_zwrotu" date NOT NULL
)
;

-- ----------------------------
-- Records of wypozyczenia
-- ----------------------------
INSERT INTO "public"."wypozyczenia" VALUES (10, 2, '2024-01-10', '2024-01-14');
INSERT INTO "public"."wypozyczenia" VALUES (11, 3, '2024-01-10', '2024-01-13');
INSERT INTO "public"."wypozyczenia" VALUES (12, 2, '2024-01-11', '2024-01-14');
INSERT INTO "public"."wypozyczenia" VALUES (13, 3, '2024-01-12', '2024-01-16');
INSERT INTO "public"."wypozyczenia" VALUES (14, 2, '2024-01-13', '2024-01-18');
INSERT INTO "public"."wypozyczenia" VALUES (15, 3, '2024-01-14', '2024-01-19');
INSERT INTO "public"."wypozyczenia" VALUES (16, 2, '2024-01-15', '2024-01-21');
INSERT INTO "public"."wypozyczenia" VALUES (17, 3, '2024-01-16', '2024-01-22');
INSERT INTO "public"."wypozyczenia" VALUES (18, 2, '2024-01-17', '2024-01-23');
INSERT INTO "public"."wypozyczenia" VALUES (19, 3, '2024-01-22', '2024-01-28');
INSERT INTO "public"."wypozyczenia" VALUES (41, 3, '2024-01-27', '2024-01-28');

-- ----------------------------
-- Table structure for wypozyczenia_rowery
-- ----------------------------
DROP TABLE IF EXISTS "public"."wypozyczenia_rowery";
CREATE TABLE "public"."wypozyczenia_rowery" (
  "wypozyczenia_rowery_id" int4 NOT NULL DEFAULT nextval('wypozyczenia_rowery_wypozyczenia_rowery_id_seq'::regclass),
  "wypozyczenia_id" int4,
  "rowery_id" int4
)
;

-- ----------------------------
-- Records of wypozyczenia_rowery
-- ----------------------------
INSERT INTO "public"."wypozyczenia_rowery" VALUES (1, 10, 1);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (2, 11, 2);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (3, 12, 3);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (4, 13, 4);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (5, 14, 5);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (6, 15, 6);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (7, 16, 7);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (8, 17, 8);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (9, 18, 9);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (10, 19, 10);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (11, 10, 11);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (12, 11, 12);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (13, 12, 13);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (14, 13, 14);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (15, 14, 15);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (16, 15, 16);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (17, 16, 17);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (18, 17, 18);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (19, 18, 19);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (20, 19, 20);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (21, 10, 21);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (22, 11, 22);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (23, 12, 23);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (24, 13, 24);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (25, 14, 25);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (26, 15, 26);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (27, 16, 27);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (28, 17, 28);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (29, 18, 29);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (30, 19, 30);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (31, 10, 31);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (32, 11, 32);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (33, 12, 33);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (34, 13, 34);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (35, 14, 35);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (36, 15, 36);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (92, 41, 4);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (93, 41, 3);
INSERT INTO "public"."wypozyczenia_rowery" VALUES (94, 41, 2);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."kategorie_kont_kategoria_id_seq"
OWNED BY "public"."kategorie_kont"."kategoria_id";
SELECT setval('"public"."kategorie_kont_kategoria_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."kategorie_rowerow_kategoria_id_seq"
OWNED BY "public"."kategorie_rowerow"."kategoria_id";
SELECT setval('"public"."kategorie_rowerow_kategoria_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."konta_details_id_seq"
OWNED BY "public"."konta_details"."id";
SELECT setval('"public"."konta_details_id_seq"', 10, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."konta_konta_id_seq"
OWNED BY "public"."konta"."konta_id";
SELECT setval('"public"."konta_konta_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."rezerwacje_serwis_rezerwacja_id_seq"
OWNED BY "public"."rezerwacje_serwis"."rezerwacja_id";
SELECT setval('"public"."rezerwacje_serwis_rezerwacja_id_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."rowery_rower_id_seq"
OWNED BY "public"."rowery"."rower_id";
SELECT setval('"public"."rowery_rower_id_seq"', 36, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."wypozyczenia_rowery_wypozyczenia_rowery_id_seq"
OWNED BY "public"."wypozyczenia_rowery"."wypozyczenia_rowery_id";
SELECT setval('"public"."wypozyczenia_rowery_wypozyczenia_rowery_id_seq"', 94, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."wypozyczenia_wypozyczenie_id_seq"
OWNED BY "public"."wypozyczenia"."wypozyczenie_id";
SELECT setval('"public"."wypozyczenia_wypozyczenie_id_seq"', 41, true);

-- ----------------------------
-- Primary Key structure for table kategorie_kont
-- ----------------------------
ALTER TABLE "public"."kategorie_kont" ADD CONSTRAINT "kategorie_kont_pkey" PRIMARY KEY ("kategoria_id");

-- ----------------------------
-- Primary Key structure for table kategorie_rowerow
-- ----------------------------
ALTER TABLE "public"."kategorie_rowerow" ADD CONSTRAINT "kategorie_rowerow_pkey" PRIMARY KEY ("kategoria_id");

-- ----------------------------
-- Primary Key structure for table konta
-- ----------------------------
ALTER TABLE "public"."konta" ADD CONSTRAINT "konta_pkey" PRIMARY KEY ("konta_id");

-- ----------------------------
-- Primary Key structure for table konta_details
-- ----------------------------
ALTER TABLE "public"."konta_details" ADD CONSTRAINT "konta_details_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table rezerwacje_serwis
-- ----------------------------
ALTER TABLE "public"."rezerwacje_serwis" ADD CONSTRAINT "rezerwacje_serwis_pkey" PRIMARY KEY ("rezerwacja_id");

-- ----------------------------
-- Primary Key structure for table rowery
-- ----------------------------
ALTER TABLE "public"."rowery" ADD CONSTRAINT "rowery_pkey" PRIMARY KEY ("rower_id");

-- ----------------------------
-- Primary Key structure for table wypozyczenia
-- ----------------------------
ALTER TABLE "public"."wypozyczenia" ADD CONSTRAINT "wypozyczenia_pkey" PRIMARY KEY ("wypozyczenie_id");

-- ----------------------------
-- Primary Key structure for table wypozyczenia_rowery
-- ----------------------------
ALTER TABLE "public"."wypozyczenia_rowery" ADD CONSTRAINT "wypozyczenia_rowery_pkey" PRIMARY KEY ("wypozyczenia_rowery_id");

-- ----------------------------
-- Foreign Keys structure for table konta
-- ----------------------------
ALTER TABLE "public"."konta" ADD CONSTRAINT "konta_details__fk" FOREIGN KEY ("id_konta_details") REFERENCES "public"."konta_details" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."konta" ADD CONSTRAINT "konta_kategorie_kont_kategoria_id_fk" FOREIGN KEY ("id_kategorie_kont") REFERENCES "public"."kategorie_kont" ("kategoria_id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table rezerwacje_serwis
-- ----------------------------
ALTER TABLE "public"."rezerwacje_serwis" ADD CONSTRAINT "rezerwacje_serwis_konta_id_fkey" FOREIGN KEY ("konta_id") REFERENCES "public"."konta" ("konta_id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table rowery
-- ----------------------------
ALTER TABLE "public"."rowery" ADD CONSTRAINT "rowery_kategoria_id_fkey" FOREIGN KEY ("kategoria_id") REFERENCES "public"."kategorie_rowerow" ("kategoria_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table wypozyczenia
-- ----------------------------
ALTER TABLE "public"."wypozyczenia" ADD CONSTRAINT "wypozyczenia_konta_id_fkey" FOREIGN KEY ("konta_id") REFERENCES "public"."konta" ("konta_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table wypozyczenia_rowery
-- ----------------------------
ALTER TABLE "public"."wypozyczenia_rowery" ADD CONSTRAINT "wypozyczenia_rowery_rowery_id_fkey" FOREIGN KEY ("rowery_id") REFERENCES "public"."rowery" ("rower_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."wypozyczenia_rowery" ADD CONSTRAINT "wypozyczenia_rowery_wypozyczenia_id_fkey" FOREIGN KEY ("wypozyczenia_id") REFERENCES "public"."wypozyczenia" ("wypozyczenie_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
