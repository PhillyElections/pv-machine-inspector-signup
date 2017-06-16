/* ==================== constants ==================== */
SET @tnow = NOW();
SET @tnl  = '0000-00-00 00:00:00';
SET @tns  = '0000-00-00';
SET @db   = DATABASE();

/* ==================== data ==================== */

INSERT INTO `[[db_prefix]]pv_mi_signups` 
(`division`, `first_name`, `middle_name`, `last_name`, `address1`,     `address2`, `city`,         `region`, `postcode`, `email`,        `phone`,      `published`, `created`)
VALUES
('0101',     'some',       '',            'guy',       '3365 Vaux St', '',         'Philadelphia', 'PA',     '19129',    'some@guy.com', '2342342345',  1,           NOW());
