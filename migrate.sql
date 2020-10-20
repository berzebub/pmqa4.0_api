CREATE TABLE `user_accounts`
(
  `id` INT NOT NULL,
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(16) NOT NULL,
  `office` TEXT NOT NULL,
  `collaborator` TEXT NOT NULL COMMENT 'ชื่อผู้ประสานงาน',
  `tel` TEXT NOT NULL COMMENT 'เบอร์โทร'
) ENGINE=InnoDB COLLATE=utf8_bin COMMENT='accounts ของผู้ใช้แต่ละหน่วยงาน';

CREATE TABLE `assessor_accounts`
(
  `id` INT NOT NULL,
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(16) NOT NULL,
  `tel` VARCHAR(10) NOT NULL
) ENGINE=InnoDB COLLATE=utf8_bin COMMENT='account ของผู้ประเมิน';

CREATE TABLE `assessment_status`
(
  `id` INT NOT NULL,
  `year` INT NOT NULL,
  `end_date` DATE NOT NULL COMMENT 'วันสิ้นสุดการประเมิน',
  `status` INT NOT NULL COMMENT 'สถานะ 0=ปิด / 1=เปิด'
) ENGINE=InnoDB COLLATE=utf8_bin COMMENT='สถานะการเปิด / ปิด ประเมิน';

CREATE TABLE `user_stepper_log`
(
  `id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `year` INT NOT NULL COMMENT 'ปี หรือครั้ง ที่ประเมิน เพื่อทำให้โปรแกรมสามารถใช้ รายปีได้
อ้างอิงจาก assessment_status.year',
  `category0` INT NOT NULL COMMENT 'ลักษณะองค์กร 0 = false , 1 = true',
  `category1` INT NOT NULL COMMENT '0 = false , 1 = true',
  `category2` INT NOT NULL COMMENT '0 = false , 1 = true',
  `category3` INT NOT NULL COMMENT '0 = false , 1 = true',
  `category4` INT NOT NULL COMMENT '0 = false , 1 = true',
  `category5` INT NOT NULL COMMENT '0 = false , 1 = true',
  `category6` INT NOT NULL COMMENT '0 = false , 1 = true',
  `category7` INT NOT NULL COMMENT '0 = false , 1 = true',
  `send_status` INT NOT NULL COMMENT '0 = false , 1 = true'
) ENGINE=InnoDB COLLATE=utf8_bin;

CREATE TABLE `category0_log`
(
  `id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `q_number` INT NOT NULL COMMENT 'ข้อใหญ่ที่',
  `category` VARCHAR(4) NOT NULL COMMENT 'ชุดคำตอบ ก. ข. ค. ฯลฯ',
  `category_q_number` INT NOT NULL COMMENT 'ข้อย่อยในหมวดหมู่',
  `text` TEXT NOT NULL,
  `year` INT NOT NULL
) ENGINE=InnoDB COLLATE=utf8_bin COMMENT='ตารางเก็บข้อมูลการประเมินลักษณะองค์กร';

CREATE TABLE `category1-6_log`
(
  `id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `step` INT NOT NULL COMMENT 'หมวดที่',
  `q_number` INT NOT NULL COMMENT 'ข้อที่',
  `mode` VARCHAR(12) NOT NULL COMMENT 'mode  -- Basic // Advance // Significance',
  `text` TEXT NOT NULL,
  `check_box` TEXT NOT NULL COMMENT 'เช็ค box ที่เลือก
รูปแบบ 0-0-0
0 = false, 1 = true',
  `pdf_path` TEXT NOT NULL,
  `img_path` TEXT NOT NULL,
  `status` INT NOT NULL COMMENT '0= false , 1= true
สถานะการบันทึกข้อมูลข้อนั้นๆ',
  `year` INT NOT NULL
) ENGINE=InnoDB COLLATE=utf8_bin;

ALTER TABLE `user_accounts` ADD PRIMARY KEY (`id`);
ALTER TABLE `assessor_accounts` ADD PRIMARY KEY (`id`);
ALTER TABLE `assessment_status` ADD PRIMARY KEY (`id`);
ALTER TABLE `user_stepper_log` ADD PRIMARY KEY (`id`);
ALTER TABLE `category0_log` ADD PRIMARY KEY (`id`);
ALTER TABLE `category1-6_log` ADD PRIMARY KEY (`id`);
ALTER TABLE `user_accounts` CHANGE COLUMN `id` `id`  INT NOT NULL AUTO_INCREMENT;
ALTER TABLE `assessor_accounts` CHANGE COLUMN `id` `id`  INT NOT NULL AUTO_INCREMENT;
ALTER TABLE `assessment_status` CHANGE COLUMN `id` `id`  INT NOT NULL AUTO_INCREMENT;
ALTER TABLE `user_stepper_log` CHANGE COLUMN `id` `id`  INT NOT NULL AUTO_INCREMENT;
ALTER TABLE `category0_log` CHANGE COLUMN `id` `id`  INT NOT NULL AUTO_INCREMENT;
ALTER TABLE `category1-6_log` CHANGE COLUMN `id` `id`  INT NOT NULL AUTO_INCREMENT;
