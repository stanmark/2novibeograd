<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171120192515 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, groupp_id INT DEFAULT NULL, team VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_C4E0A61F989D9B62 (slug), INDEX IDX_C4E0A61F1D829221 (groupp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE features (id INT AUTO_INCREMENT NOT NULL, features VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BFC0DC13989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, treaningPlace TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_741D53CD989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time (id INT AUTO_INCREMENT NOT NULL, place_id INT DEFAULT NULL, date DATE NOT NULL, day DATE NOT NULL, begin TIME NOT NULL, end TIME NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, INDEX IDX_6F949845DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bread_crumps (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, Description VARCHAR(255) NOT NULL, titletag VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_13B72DF0989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, place_id INT DEFAULT NULL, team1_id INT DEFAULT NULL, team2_id INT DEFAULT NULL, round_id INT DEFAULT NULL, bod_team1 INT NOT NULL, bod_team2 INT NOT NULL, number_set1 INT NOT NULL, set_team2 INT NOT NULL, date DATE NOT NULL, begin TIME NOT NULL, end TIME DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, INDEX IDX_232B318CDA6A219 (place_id), INDEX IDX_232B318CE72BCFA4 (team1_id), INDEX IDX_232B318CF59E604A (team2_id), INDEX IDX_232B318CA6005CA0 (round_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, price VARCHAR(10) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E5F1AC33989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing_features (pricing_id INT NOT NULL, features_id INT NOT NULL, INDEX IDX_FFDE2CFB8864AF73 (pricing_id), INDEX IDX_FFDE2CFBCEC89005 (features_id), PRIMARY KEY(pricing_id, features_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE round (id INT AUTO_INCREMENT NOT NULL, groupp_id INT DEFAULT NULL, rounds VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C5EEEA34989D9B62 (slug), INDEX IDX_C5EEEA341D829221 (groupp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE why_us (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_E4348BF8989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_slider (id INT AUTO_INCREMENT NOT NULL, MainTitle VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, SubTitle VARCHAR(255) NOT NULL, SubTitleDescription VARCHAR(255) NOT NULL, CallToActionLink VARCHAR(255) NOT NULL, CallToActionButton VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_3FC379BA989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_33C1CB7A989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE our_services (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E7212EA5989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, Name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, Phone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, faceurl VARCHAR(255) NOT NULL, gurl VARCHAR(255) NOT NULL, pib INT NOT NULL, matnumber INT NOT NULL, bankacount VARCHAR(255) NOT NULL, bank VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_4FBF094F989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_C0155143989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE league (id INT AUTO_INCREMENT NOT NULL, league VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, year VARCHAR(5) NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_3EB4C318989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sett_results (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, points_number1 INT NOT NULL, points_number2 INT NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, INDEX IDX_D5A6C22AE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupp (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, groupp VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_696468CA989D9B62 (slug), INDEX IDX_696468CAE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE main_gallery (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, mainTeamMemberPicture TINYINT(1) DEFAULT NULL, mainBlogPicture TINYINT(1) DEFAULT NULL, mainPictureGallery TINYINT(1) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_B360D1D3989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mainGallery_league (league_id INT NOT NULL, mainGallerry_id INT NOT NULL, INDEX IDX_4CA7A4D15F301E82 (mainGallerry_id), INDEX IDX_4CA7A4D158AFC4DE (league_id), PRIMARY KEY(mainGallerry_id, league_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mainGallery_teamMember (mainGallerry_id INT NOT NULL, teamMember_id INT NOT NULL, INDEX IDX_A34F77395F301E82 (mainGallerry_id), INDEX IDX_A34F773961E4C843 (teamMember_id), PRIMARY KEY(mainGallerry_id, teamMember_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mainGallery_place (place_id INT NOT NULL, mainGallerry_id INT NOT NULL, INDEX IDX_601D1F0B5F301E82 (mainGallerry_id), INDEX IDX_601D1F0BDA6A219 (place_id), PRIMARY KEY(mainGallerry_id, place_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mainGallery_HomeSlider (mainGallerry_id INT NOT NULL, HomeSlider_id INT NOT NULL, INDEX IDX_9FCD2E465F301E82 (mainGallerry_id), INDEX IDX_9FCD2E465686E303 (HomeSlider_id), PRIMARY KEY(mainGallerry_id, HomeSlider_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mainGallery_galleryCategory (mainGallerry_id INT NOT NULL, GalleryCategory_id INT NOT NULL, INDEX IDX_6D9EEDEA5F301E82 (mainGallerry_id), INDEX IDX_6D9EEDEAC53BAB7B (GalleryCategory_id), PRIMARY KEY(mainGallerry_id, GalleryCategory_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mainGallery_BreadCrumps (mainGallerry_id INT NOT NULL, BreadCrumps_id INT NOT NULL, INDEX IDX_D3CD91D25F301E82 (mainGallerry_id), INDEX IDX_D3CD91D2486BCC06 (BreadCrumps_id), PRIMARY KEY(mainGallerry_id, BreadCrumps_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mainGallery_Blog (blog_id INT NOT NULL, mainGallerry_id INT NOT NULL, INDEX IDX_613777615F301E82 (mainGallerry_id), INDEX IDX_61377761DAE07E97 (blog_id), PRIMARY KEY(mainGallerry_id, blog_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_member (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, education VARCHAR(255) NOT NULL, faceurl VARCHAR(255) NOT NULL, gurl VARCHAR(255) NOT NULL, inurl VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6FFBDA1989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_place (member_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_163CC63E7597D3FE (member_id), INDEX IDX_163CC63EDA6A219 (place_id), PRIMARY KEY(member_id, place_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F1D829221 FOREIGN KEY (groupp_id) REFERENCES groupp (id)');
        $this->addSql('ALTER TABLE time ADD CONSTRAINT FK_6F949845DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CE72BCFA4 FOREIGN KEY (team1_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CF59E604A FOREIGN KEY (team2_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CA6005CA0 FOREIGN KEY (round_id) REFERENCES round (id)');
        $this->addSql('ALTER TABLE pricing_features ADD CONSTRAINT FK_FFDE2CFB8864AF73 FOREIGN KEY (pricing_id) REFERENCES pricing (id)');
        $this->addSql('ALTER TABLE pricing_features ADD CONSTRAINT FK_FFDE2CFBCEC89005 FOREIGN KEY (features_id) REFERENCES features (id)');
        $this->addSql('ALTER TABLE round ADD CONSTRAINT FK_C5EEEA341D829221 FOREIGN KEY (groupp_id) REFERENCES groupp (id)');
        $this->addSql('ALTER TABLE sett_results ADD CONSTRAINT FK_D5A6C22AE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE groupp ADD CONSTRAINT FK_696468CAE48FD905 FOREIGN KEY (game_id) REFERENCES league (id)');
        $this->addSql('ALTER TABLE mainGallery_league ADD CONSTRAINT FK_4CA7A4D15F301E82 FOREIGN KEY (mainGallerry_id) REFERENCES main_gallery (id)');
        $this->addSql('ALTER TABLE mainGallery_league ADD CONSTRAINT FK_4CA7A4D158AFC4DE FOREIGN KEY (league_id) REFERENCES league (id)');
        $this->addSql('ALTER TABLE mainGallery_teamMember ADD CONSTRAINT FK_A34F77395F301E82 FOREIGN KEY (mainGallerry_id) REFERENCES main_gallery (id)');
        $this->addSql('ALTER TABLE mainGallery_teamMember ADD CONSTRAINT FK_A34F773961E4C843 FOREIGN KEY (teamMember_id) REFERENCES team_member (id)');
        $this->addSql('ALTER TABLE mainGallery_place ADD CONSTRAINT FK_601D1F0B5F301E82 FOREIGN KEY (mainGallerry_id) REFERENCES main_gallery (id)');
        $this->addSql('ALTER TABLE mainGallery_place ADD CONSTRAINT FK_601D1F0BDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE mainGallery_HomeSlider ADD CONSTRAINT FK_9FCD2E465F301E82 FOREIGN KEY (mainGallerry_id) REFERENCES main_gallery (id)');
        $this->addSql('ALTER TABLE mainGallery_HomeSlider ADD CONSTRAINT FK_9FCD2E465686E303 FOREIGN KEY (HomeSlider_id) REFERENCES home_slider (id)');
        $this->addSql('ALTER TABLE mainGallery_galleryCategory ADD CONSTRAINT FK_6D9EEDEA5F301E82 FOREIGN KEY (mainGallerry_id) REFERENCES main_gallery (id)');
        $this->addSql('ALTER TABLE mainGallery_galleryCategory ADD CONSTRAINT FK_6D9EEDEAC53BAB7B FOREIGN KEY (GalleryCategory_id) REFERENCES gallery_category (id)');
        $this->addSql('ALTER TABLE mainGallery_BreadCrumps ADD CONSTRAINT FK_D3CD91D25F301E82 FOREIGN KEY (mainGallerry_id) REFERENCES main_gallery (id)');
        $this->addSql('ALTER TABLE mainGallery_BreadCrumps ADD CONSTRAINT FK_D3CD91D2486BCC06 FOREIGN KEY (BreadCrumps_id) REFERENCES bread_crumps (id)');
        $this->addSql('ALTER TABLE mainGallery_Blog ADD CONSTRAINT FK_613777615F301E82 FOREIGN KEY (mainGallerry_id) REFERENCES main_gallery (id)');
        $this->addSql('ALTER TABLE mainGallery_Blog ADD CONSTRAINT FK_61377761DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id)');
        $this->addSql('ALTER TABLE member_place ADD CONSTRAINT FK_163CC63E7597D3FE FOREIGN KEY (member_id) REFERENCES team_member (id)');
        $this->addSql('ALTER TABLE member_place ADD CONSTRAINT FK_163CC63EDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CE72BCFA4');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CF59E604A');
        $this->addSql('ALTER TABLE pricing_features DROP FOREIGN KEY FK_FFDE2CFBCEC89005');
        $this->addSql('ALTER TABLE time DROP FOREIGN KEY FK_6F949845DA6A219');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CDA6A219');
        $this->addSql('ALTER TABLE mainGallery_place DROP FOREIGN KEY FK_601D1F0BDA6A219');
        $this->addSql('ALTER TABLE member_place DROP FOREIGN KEY FK_163CC63EDA6A219');
        $this->addSql('ALTER TABLE mainGallery_BreadCrumps DROP FOREIGN KEY FK_D3CD91D2486BCC06');
        $this->addSql('ALTER TABLE sett_results DROP FOREIGN KEY FK_D5A6C22AE48FD905');
        $this->addSql('ALTER TABLE pricing_features DROP FOREIGN KEY FK_FFDE2CFB8864AF73');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CA6005CA0');
        $this->addSql('ALTER TABLE mainGallery_HomeSlider DROP FOREIGN KEY FK_9FCD2E465686E303');
        $this->addSql('ALTER TABLE mainGallery_galleryCategory DROP FOREIGN KEY FK_6D9EEDEAC53BAB7B');
        $this->addSql('ALTER TABLE mainGallery_Blog DROP FOREIGN KEY FK_61377761DAE07E97');
        $this->addSql('ALTER TABLE groupp DROP FOREIGN KEY FK_696468CAE48FD905');
        $this->addSql('ALTER TABLE mainGallery_league DROP FOREIGN KEY FK_4CA7A4D158AFC4DE');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F1D829221');
        $this->addSql('ALTER TABLE round DROP FOREIGN KEY FK_C5EEEA341D829221');
        $this->addSql('ALTER TABLE mainGallery_league DROP FOREIGN KEY FK_4CA7A4D15F301E82');
        $this->addSql('ALTER TABLE mainGallery_teamMember DROP FOREIGN KEY FK_A34F77395F301E82');
        $this->addSql('ALTER TABLE mainGallery_place DROP FOREIGN KEY FK_601D1F0B5F301E82');
        $this->addSql('ALTER TABLE mainGallery_HomeSlider DROP FOREIGN KEY FK_9FCD2E465F301E82');
        $this->addSql('ALTER TABLE mainGallery_galleryCategory DROP FOREIGN KEY FK_6D9EEDEA5F301E82');
        $this->addSql('ALTER TABLE mainGallery_BreadCrumps DROP FOREIGN KEY FK_D3CD91D25F301E82');
        $this->addSql('ALTER TABLE mainGallery_Blog DROP FOREIGN KEY FK_613777615F301E82');
        $this->addSql('ALTER TABLE mainGallery_teamMember DROP FOREIGN KEY FK_A34F773961E4C843');
        $this->addSql('ALTER TABLE member_place DROP FOREIGN KEY FK_163CC63E7597D3FE');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE features');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE time');
        $this->addSql('DROP TABLE bread_crumps');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE pricing');
        $this->addSql('DROP TABLE pricing_features');
        $this->addSql('DROP TABLE round');
        $this->addSql('DROP TABLE why_us');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE home_slider');
        $this->addSql('DROP TABLE gallery_category');
        $this->addSql('DROP TABLE our_services');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE league');
        $this->addSql('DROP TABLE sett_results');
        $this->addSql('DROP TABLE groupp');
        $this->addSql('DROP TABLE main_gallery');
        $this->addSql('DROP TABLE mainGallery_league');
        $this->addSql('DROP TABLE mainGallery_teamMember');
        $this->addSql('DROP TABLE mainGallery_place');
        $this->addSql('DROP TABLE mainGallery_HomeSlider');
        $this->addSql('DROP TABLE mainGallery_galleryCategory');
        $this->addSql('DROP TABLE mainGallery_BreadCrumps');
        $this->addSql('DROP TABLE mainGallery_Blog');
        $this->addSql('DROP TABLE team_member');
        $this->addSql('DROP TABLE member_place');
    }
}
