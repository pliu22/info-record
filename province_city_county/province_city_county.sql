create table province_city_county(
	id int(5) unsinged not null primary key auto_increment,
	pid int(5) unsigned not null default '0',
	name varhcar(30) not null
);
insert into province_city_county values
	('null','0','guangdong'),('null','1','guangzhou'),('null','1','shenzhen'),('null','2','baiyunqu'),('null','tianhequ'),('null','3','baoanqu'),('null','3','nanshanqu');