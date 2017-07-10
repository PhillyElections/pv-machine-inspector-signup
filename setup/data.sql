/* ==================== constants ==================== */
SET @tnow = NOW();
SET @tnl = '0000-00-00 00:00:00';
SET @tns = '0000-00-00';
SET @db = DATABASE();

/* ==================== data ==================== */

INSERT INTO `[[db_prefix]]pv_machine_inspector_signups`
(`division`, `first_name`, `middle_name`, `last_name`, `address1`, `address2`, `city`, `region`, `postcode`, `email`, `phone`, `published`, `created`)
VALUES
('0101', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0102', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0103', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0104', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0105', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0106', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0107', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0108', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0109', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0110', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0111', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0112', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0113', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0114', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0115', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0116', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0117', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0118', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0119', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0120', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0121', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0122', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0123', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0124', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0125', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0126', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0127', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0128', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0129', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0130', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0131', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0132', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0133', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0134', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0135', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0136', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0137', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW()),
('0138', 'some', '', 'guy', '3365 Vaux St', '', 'Philadelphia', 'PA', '19129', 'some@guy.com', '2342342345', 1, NOW());
