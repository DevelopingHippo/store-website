use sat3210;
DELETE FROM purchaseHistory;
DELETE FROM store;
DELETE FROM users;
DELETE FROM ram;
DELETE FROM motherboard;
DELETE FROM psu;
DELETE FROM cpu;
DELETE FROM gpu;

# this is for creating employee information
insert into users VALUES ("admin","Example","Admin","admin@example.com","admin","employee",true);


# this is for creating customer informatiom
insert into users VALUES ("exampleUser","Example","User","customer@example.com","examplepassword","customer",false);


# CPU Store Information
insert into store VALUES("cpu","i5-10600", 314.99);
insert into store VALUES("cpu","i5-10600K", 238.00);
insert into store VALUES("cpu","i5-12600K", 444.98);
insert into store VALUES("cpu","i7-7700K", 329.99);
insert into store VALUES("cpu","i7-10700", 322.99);
insert into store VALUES("cpu","i7-10700K", 346.98);
insert into store VALUES("cpu","i7-11700", 319.99);
insert into store VALUES("cpu","i9-10900", 411.73);
insert into store VALUES("cpu","i9-10900K", 458.99);
insert into store VALUES("cpu","i9-11900K", 439.99);
insert into store VALUES("cpu","Ryzen 5 3600", 298.25);
insert into store VALUES("cpu","Ryzen 5 5600X", 294.00);
insert into store VALUES("cpu","Ryzen 7 5800X", 383.24);
insert into store VALUES("cpu","Ryzen 9 5900X", 559.99);

# GPU Store Information
insert into store VALUES("gpu","GTX 1050 TI", 159.99);
insert into store VALUES("gpu","GTX 1060", 249.99);
insert into store VALUES("gpu","GTX 1070", 599.99);
insert into store VALUES("gpu","GTX 1080", 799.99);
insert into store VALUES("gpu","RTX 3060", 447.99);
insert into store VALUES("gpu","RTX 3060 TI", 864.99);

# PSU Store Information
insert into store values("psu","SuperNOVA 750 G3", 149.99);
insert into store values("psu","RM850X", 149.99);
insert into store values("psu","V850 SFX", 144.99);
insert into store values("psu","MPG A-GF 750", 144.99);
insert into store values("psu","CORE GM 500", 29.99);

# RAM Store Information
insert into store values("ram","Vengeance RGB Pro", 152.99);
insert into store values("ram","Ripjaws V", 99.99);
insert into store values("ram","Trident Z", 74.99);
insert into store values("ram","Dominator Platinum RGB", 349.99);
insert into store values("ram","Ballistix", 84.99);

# Motherboard Store Information
insert into store values("motherboard","A520M S2H", 82.99);
insert into store values("motherboard","Z590 Gundam Edition", 319.99);
insert into store values("motherboard","Prime B560-Plus", 119.99);
insert into store values("motherboard","B550M Pro4", 89.99);
insert into store values("motherboard","Pro Z690-A", 209.99);


#SerialNum is 10 Digit #; Setup as ID-ITM-UNQID

# Insert "cpu" table values

insert into cpu VALUES ("i5-10600", 1110600001, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600002, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600003, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600004, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600005, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600006, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600007, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600008, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600009, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600010, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600011, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600012, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600013, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600014, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600015, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600016, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600017, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600018, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600019, "Intel", "LGA 1200", 6, 3.3, 4.8);
insert into cpu VALUES ("i5-10600", 1110600020, "Intel", "LGA 1200", 6, 3.3, 4.8);

insert into cpu VALUES ("i5-10600K", 1111600001, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600002, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600003, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600004, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600005, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600006, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600007, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600008, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600009, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600010, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600011, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600012, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600013, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600014, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600015, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600016, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600017, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600018, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600019, "Intel", "LGA 1200", 6, 4.1, 4.8);
insert into cpu VALUES ("i5-10600K", 1111600020, "Intel", "LGA 1200", 6, 4.1, 4.8);

insert into cpu VALUES ("i5-12600K", 1178000001, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000002, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000003, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000004, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000005, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000006, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000007, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000008, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000009, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000010, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000011, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000012, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000013, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000014, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000015, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000016, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000017, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000018, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000019, "Intel", "LGA 1700", 10, 3.7, 4.9);
insert into cpu VALUES ("i5-12600K", 1178000020, "Intel", "LGA 1700", 10, 3.7, 4.9);

insert into cpu VALUES ("i7-7700K", 1177000004, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000005, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000006, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000007, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000008, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000009, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000010, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000011, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000012, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000013, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000014, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000015, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000016, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000017, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000018, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000019, "Intel", "LGA 1151", 4, 3.7, 4.2);
insert into cpu VALUES ("i7-7700K", 1177000020, "Intel", "LGA 1151", 4, 3.7, 4.2);

insert into cpu VALUES ("i7-10700", 1110300001, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300002, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300003, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300004, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300005, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300006, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300007, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300008, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300009, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300010, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300011, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300012, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300013, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300014, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300015, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300016, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300017, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300018, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300019, "Intel", "LGA 1200", 4, 2.6, 5.0);
insert into cpu VALUES ("i7-10700", 1110300020, "Intel", "LGA 1200", 4, 2.6, 5.0);

insert into cpu VALUES ("i7-10700K", 1114300001, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300002, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300003, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300004, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300005, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300006, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300007, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300008, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300009, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300010, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300011, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300012, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300013, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300014, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300015, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300016, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300017, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300018, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300019, "Intel", "LGA 1200", 8, 3.8, 5.10);
insert into cpu VALUES ("i7-10700K", 1114300020, "Intel", "LGA 1200", 8, 3.8, 5.10);

insert into cpu VALUES ("i7-11700", 1115300001, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300002, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300003, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300004, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300005, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300006, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300007, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300008, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300009, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300010, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300011, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300012, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300013, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300014, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300015, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300016, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300017, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300018, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300019, "Intel", "LGA 1200", 8, 2.5, 4.90);
insert into cpu VALUES ("i7-11700", 1115300020, "Intel", "LGA 1200", 8, 2.5, 4.90);

insert into cpu VALUES ("i9-10900", 1111200001, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200002, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200003, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200004, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200005, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200006, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200007, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200008, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200009, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200010, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200011, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200012, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200013, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200014, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200015, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200016, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200017, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200018, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200019, "Intel", "LGA 1200", 10, 2.8, 5.20);
insert into cpu VALUES ("i9-10900", 1111200020, "Intel", "LGA 1200", 10, 2.8, 5.20);

insert into cpu VALUES ("i9-10900K", 1112300001, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300002, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300003, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300004, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300005, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300006, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300007, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300008, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300009, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300010, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300011, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300012, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300013, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300014, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300015, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300016, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300017, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300018, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300019, "Intel", "LGA 1200", 10, 3.7, 5.30);
insert into cpu VALUES ("i9-10900K", 1112300020, "Intel", "LGA 1200", 10, 3.7, 5.30);

insert into cpu VALUES ("i9-11900K", 1179000003, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000004, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000005, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000006, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000007, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000008, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000009, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000010, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000011, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000012, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000013, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000014, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000015, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000016, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000017, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000018, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000019, "Intel", "LGA 1200", 8, 3.5, 5.3);
insert into cpu VALUES ("i9-11900K", 1179000020, "Intel", "LGA 1200", 8, 3.5, 5.3);

insert into cpu VALUES ("Ryzen 5 3600", 1169300001, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300002, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300003, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300004, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300005, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300006, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300007, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300008, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300009, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300010, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300011, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300012, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300013, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300014, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300015, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300016, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300017, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300018, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300019, "AMD", "AM4", 6, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 5 3600", 1169300020, "AMD", "AM4", 6, 3.6, 4.2);

insert into cpu VALUES ("Ryzen 5 5600X", 1169000001, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000002, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000003, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000004, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000005, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000006, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000007, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000008, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000009, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000010, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000011, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000012, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000013, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000014, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000015, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000016, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000017, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000018, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000019, "AMD", "AM4", 6, 3.7, 4.6);
insert into cpu VALUES ("Ryzen 5 5600X", 1169000020, "AMD", "AM4", 6, 3.7, 4.6);

insert into cpu VALUES ("Ryzen 7 5800X", 1158200001, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200002, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200003, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200004, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200005, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200006, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200007, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200008, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200009, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200010, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200011, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200012, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200013, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200014, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200015, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200016, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200017, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200018, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200019, "AMD", "AM4", 8, 3.6, 4.2);
insert into cpu VALUES ("Ryzen 7 5800X", 1158200020, "AMD", "AM4", 8, 3.6, 4.2);

insert into cpu VALUES ("Ryzen 9 5900X", 1159000001, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000002, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000003, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000004, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000005, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000006, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000007, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000008, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000009, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000010, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000011, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000012, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000013, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000014, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000015, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000016, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000017, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000018, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000019, "AMD", "AM4", 12, 3.7, 4.8);
insert into cpu VALUES ("Ryzen 9 5900X", 1159000020, "AMD", "AM4", 12, 3.7, 4.8);


# Insert "gpu" table values
insert into gpu VALUES("GTX 1080", 2210800001, "EVGA", 1720, 11, "RGB");
insert into gpu VALUES("GTX 1080", 2210800002, "EVGA", 1720, 11, "RGB");
insert into gpu VALUES("GTX 1080", 2210800003, "EVGA", 1720, 11, "RGB");
insert into gpu VALUES("GTX 1080", 2210800004, "EVGA", 1720, 11, "RGB");
insert into gpu VALUES("GTX 1080", 2210800005, "EVGA", 1720, 11, "RGB");
insert into gpu VALUES("GTX 1070", 2210700001, "EVGA", 1600, 8, "Gold");
insert into gpu VALUES("GTX 1070", 2210700002, "EVGA", 1600, 8, "Gold");
insert into gpu VALUES("GTX 1070", 2210700003, "EVGA", 1600, 8, "Gold");
insert into gpu VALUES("GTX 1070", 2210700004, "EVGA", 1600, 8, "Gold");
insert into gpu VALUES("GTX 1070", 2210700005, "EVGA", 1600, 8, "Gold");
insert into gpu VALUES("GTX 1060", 2210600001, "EVGA", 1550, 6, "Silver");
insert into gpu VALUES("GTX 1060", 2210600002, "EVGA", 1550, 6, "Silver");
insert into gpu VALUES("GTX 1060", 2210600003, "EVGA", 1550, 6, "Silver");
insert into gpu VALUES("GTX 1060", 2210600004, "EVGA", 1550, 6, "Silver");
insert into gpu VALUES("GTX 1050 TI", 2211500001, "EVGA", 1340, 4, "Red");
insert into gpu VALUES("GTX 1050 TI", 2211500002, "EVGA", 1340, 4, "Red");
insert into gpu VALUES("GTX 1050 TI", 2211500003, "EVGA", 1340, 4, "Red");
insert into gpu VALUES("RTX 3060", 2230100002, "EVGA", 1320, 12, "Black");
insert into gpu VALUES("RTX 3060", 2230100003, "EVGA", 1320, 12, "Black");
insert into gpu VALUES("RTX 3060 TI", 2230200002, "EVGA", 1410, 8, "Black");
insert into gpu VALUES("RTX 3060 TI", 2230200003, "EVGA", 1410, 8, "Black");

# Insert "psu" table values
insert into psu VALUES ("SuperNOVA 750 G3", 3375300001, "EVGA", 750, "Full", "80 Plus Gold");
insert into psu VALUES ("SuperNOVA 750 G3", 3375300002, "EVGA", 750, "Full", "80 Plus Gold");
insert into psu VALUES ("SuperNOVA 750 G3", 3375300003, "EVGA", 750, "Full", "80 Plus Gold");
insert into psu VALUES ("SuperNOVA 750 G3", 3375300004, "EVGA", 750, "Full", "80 Plus Gold");
insert into psu VALUES ("RM850X", 3385900001, "Corsair", 850, "Full", "80 Plus Gold");
insert into psu VALUES ("RM850X", 3385900002, "Corsair", 850, "Full", "80 Plus Gold");
insert into psu VALUES ("RM850X", 3385900003, "Corsair", 850, "Full", "80 Plus Gold");
insert into psu VALUES ("RM850X", 3385900004, "Corsair", 850, "Full", "80 Plus Gold");
insert into psu VALUES ("V850 SFX", 3346300002, "Cooler Master", 850, "Full", "80 Plus Gold");
insert into psu VALUES ("V850 SFX", 3346300003, "Cooler Master", 850, "Full", "80 Plus Gold");
insert into psu VALUES ("MPG A-GF 750", 3347500004, "MSI", 750, "Full", "80 Plus Gold");
insert into psu VALUES ("MPG A-GF 750", 3347500005, "MSI", 750, "Full", "80 Plus Gold");
insert into psu VALUES ("MPG A-GF 750", 3347500006, "MSI", 750, "Full", "80 Plus Gold");
insert into psu VALUES ("CORE GM 500", 3368200001, "SeaSonic", 500, "Semi", "80 Plus Gold");
insert into psu VALUES ("CORE GM 500", 3368200002, "SeaSonic", 500, "Semi", "80 Plus Gold");
insert into psu VALUES ("CORE GM 500", 3368200003, "SeaSonic", 500, "Semi", "80 Plus Gold");

# Insert "ram" table values
insert into ram VALUES ("Vengeance RGB Pro", 4416200002, "Corsair", 3600, 16, 2, "RGB");
insert into ram VALUES ("Vengeance RGB Pro", 4416200003, "Corsair", 3600, 16, 2, "RGB");
insert into ram VALUES ("Vengeance RGB Pro", 4416200004, "Corsair", 3600, 16, 2, "RGB");
insert into ram VALUES ("Ripjaws V", 4426200001, "G.Skill", 3200, 16, 2, "Black");
insert into ram VALUES ("Ripjaws V", 4426200002, "G.Skill", 3200, 16, 2, "Black");
insert into ram VALUES ("Ripjaws V", 4426200003, "G.Skill", 3200, 16, 2, "Black");
insert into ram VALUES ("Ripjaws V", 4426200004, "G.Skill", 3200, 16, 2, "Black");
insert into ram VALUES ("Trident Z", 4446400002, "G.Skill", 3600, 16, 2, "Black");
insert into ram VALUES ("Trident Z", 4446400003, "G.Skill", 3600, 16, 2, "Black");
insert into ram VALUES ("Dominator Platinum RGB", 4456200001, "Corsair", 5200, 16, 2, "White");
insert into ram VALUES ("Dominator Platinum RGB", 4456200002, "Corsair", 5200, 16, 2, "White");
insert into ram VALUES ("Dominator Platinum RGB", 4456200003, "Corsair", 5200, 16, 2, "White");
insert into ram VALUES ("Ballistix", 4456300001, "Crucial", 3600, 8, 2, "Black");
insert into ram VALUES ("Ballistix", 4456300002, "Crucial", 3600, 8, 2, "Black");
insert into ram VALUES ("Ballistix", 4456300003, "Crucial", 3600, 8, 2, "Black");

# Insert "motherboard" table values
insert into motherboard VALUES ("A520M S2H", 5552200002, "GigaByte", "AM4", 64, 2, "Black");
insert into motherboard VALUES ("A520M S2H", 5552200003, "GigaByte", "AM4", 64, 2, "Black");
insert into motherboard VALUES ("Z590 Gundam Edition", 5559100002, "ASUS", "LGA 1200", 128, 4, "White");
insert into motherboard VALUES ("Z590 Gundam Edition", 5559100003, "ASUS", "LGA 1200", 128, 4, "White");
insert into motherboard VALUES ("Prime B560-Plus", 5564100002, "ASUS", "LGA 1200", 128, 4, "Silver");
insert into motherboard VALUES ("Prime B560-Plus", 5564100003, "ASUS", "LGA 1200", 128, 4, "Silver");
insert into motherboard VALUES ("B550M Pro4", 5522500002, "ASRock", "AM4", 128, 4, "Silver");
insert into motherboard VALUES ("B550M Pro4", 5522500003, "ASRock", "AM4", 128, 4, "Silver");
insert into motherboard VALUES ("PRO Z690-A", 5546700001, "MSI", "LGA1700", 128, 4, "Black");
insert into motherboard VALUES ("PRO Z690-A", 5546700002, "MSI", "LGA1700", 128, 4, "Black");
insert into motherboard VALUES ("PRO Z690-A", 5546700003, "MSI", "LGA1700", 128, 4, "Black");


# Receipt ID is just +1 from the max receiptID