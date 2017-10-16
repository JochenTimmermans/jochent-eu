/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Sep 12, 2017
 */

/* old db
INSERT INTO categories (name)
  VALUES ('computer'),('finance'),('agriculture'),('beauty');
*/

INSERT INTO categories (name,level_head)
  VALUES 
("Agriculture, Forestry, And Fishing",0),
    ("Agricultural Production Crops", 1),
    ("Agriculture production livestock and animal specialties", 1),
    ("Agricultural Services", 1),
    ("Forestry", 1),
    ("Fishing, hunting, and trapping", 1),

("Mining", 0),
    ("Metal Mining", 2),
    ("Coal Mining", 2),
    ("Oil And Gas Extraction", 2),
    ("Mining And Quarrying Of Nonmetallic Minerals, Except Fuels", 2),

("Construction", 0),
    ("Building Construction General Contractors And Operative Builders", 3),
    ("Heavy Construction Other Than Building Construction Contractors", 3),
    ("Construction Special Trade Contractors", 3),

("Manufacturing", 0),
    ("Food And Kindred Products", 4),
    ("Tobacco Products", 4),
    ("Textile Mill Products", 4),
    ("Apparel And Other Finished Products Made From Fabrics And Similar Materials", 4),
    ("Lumber And Wood Products, Except Furniture", 4),
    ("Furniture And Fixtures", 4),
    ("Paper And Allied Products", 4),
    ("Printing, Publishing, And Allied Industries", 4),
    ("Chemicals And Allied Products", 4),
    ("Petroleum Refining And Related Industries", 4),
    ("Rubber And Miscellaneous Plastics Products", 4),
    ("Major Group 31: Leather And Leather Products", 4),
    ("Major Group 32: Stone, Clay, Glass, And Concrete Products", 4),
    ("Major Group 33: Primary Metal Industries", 4),
    ("Major Group 34: Fabricated Metal Products, Except Machinery And Transportation Equipment", 4),
    ("Major Group 35: Industrial And Commercial Machinery And Computer Equipment", 4),
    ("Major Group 36: Electronic And Other Electrical Equipment And Components, Except Computer Equipment", 4),
    ("Major Group 37: Transportation Equipment", 4),
    ("Major Group 38: Measuring, Analyzing, And Controlling Instruments; Photographic, Medical And Optical Goods; Watches And Clocks", 4),
    ("Major Group 39: Miscellaneous Manufacturing Industries", 4),

("E.  Division E: Transportation, Communications, Electric, Gas, And Sanitary Services", 0),
    ("Major Group 40: Railroad Transportation", 5),
    ("Major Group 41: Local And Suburban Transit And Interurban Highway Passenger Transportation", 5),
    ("Major Group 42: Motor Freight Transportation And Warehousing", 5),
    ("Major Group 43: United States Postal Service", 5),
    ("Major Group 44: Water Transportation", 5),
    ("Major Group 45: Transportation By Air", 5),
    ("Major Group 46: Pipelines, Except Natural Gas", 5),
    ("Major Group 47: Transportation Services", 5),
    ("Major Group 48: Communications", 5),
    ("Major Group 49: Electric, Gas, And Sanitary Services", 5),

("F.  Division F: Wholesale Trade", 0),
    ("Major Group 50: Wholesale Trade-durable Goods", 6),
    ("Major Group 51: Wholesale Trade-non-durable Goods", 6),

("G.  Division G: Retail Trade", 0),
    ("Major Group 52: Building Materials, Hardware, Garden Supply, And Mobile Home Dealers", 7),
    ("Major Group 53: General Merchandise Stores", 7),
    ("Major Group 54: Food Stores", 7),
    ("Major Group 55: Automotive Dealers And Gasoline Service Stations", 7),
    ("Major Group 56: Apparel And Accessory Stores", 7),
    ("Major Group 57: Home Furniture, Furnishings, And Equipment Stores", 7),
    ("Major Group 58: Eating And Drinking Places", 7),
    ("Major Group 59: Miscellaneous Retail", 7),

("H.  Division H: Finance, Insurance, And Real Estate", 0),
    ("Major Group 60: Depository Institutions", 8),
    ("Major Group 61: Non-depository Credit Institutions", 8),
    ("Major Group 62: Security And Commodity Brokers, Dealers, Exchanges, And Services", 8),
    ("Major Group 63: Insurance Carriers", 8),
    ("Major Group 64: Insurance Agents, Brokers, And Service", 8),
    ("Major Group 65: Real Estate", 8),
    ("Major Group 67: Holding And Other Investment Offices", 8),

("I.  Division I: Services", 0),
    ("Major Group 70: Hotels, Rooming Houses, Camps, And Other Lodging Places", 9),
    ("Major Group 72: Personal Services", 9),
    ("Major Group 73: Business Services", 9),
    ("Major Group 75: Automotive Repair, Services, And Parking", 9),
    ("Major Group 76: Miscellaneous Repair Services", 9),
    ("Major Group 78: Motion Pictures", 9),
    ("Major Group 79: Amusement And Recreation Services", 9),
    ("Major Group 80: Health Services", 9),
    ("Major Group 81: Legal Services", 9),
    ("Major Group 82: Educational Services", 9),
    ("Major Group 83: Social Services", 9),
    ("Major Group 84: Museums, Art Galleries, And Botanical And Zoological Gardens", 9),
    ("Major Group 86: Membership Organizations", 9),
    ("Major Group 87: Engineering, Accounting, Research, Management, And Related Services", 9),
    ("Major Group 88: Private Households", 9),
    ("Major Group 89: Miscellaneous Services", 9),

("J.  Division J: Public Administration", 0),
    ("Major Group 91: Executive, Legislative, And General Government, Except Finance", 10),
    ("Major Group 92: Justice, Public Order, And Safety", 10),
    ("Major Group 93: Public Finance, Taxation, And Monetary Policy", 10),
    ("Major Group 94: Administration Of Human Resource Programs", 10),
    ("Major Group 95: Administration Of Environmental Quality And Housing Programs", 10),
    ("Major Group 96: Administration Of Economic Programs", 10),
    ("Major Group 97: National Security And International Affairs", 10),
    ("Major Group 99: Nonclassifiable Establishments", 10);






/* The DATA
A.  Division A: Agriculture, Forestry, And Fishing
    Major Group 01: Agricultural Production Crops
    Major Group 02: Agriculture production livestock and animal specialties
    Major Group 07: Agricultural Services
    Major Group 08: Forestry
    Major Group 09: Fishing, hunting, and trapping

B.  Division B: Mining
    Major Group 10: Metal Mining
    Major Group 12: Coal Mining
    Major Group 13: Oil And Gas Extraction
    Major Group 14: Mining And Quarrying Of Nonmetallic Minerals, Except Fuels

C.  Division C: Construction
    Major Group 15: Building Construction General Contractors And Operative Builders
    Major Group 16: Heavy Construction Other Than Building Construction Contractors
    Major Group 17: Construction Special Trade Contractors

D.  Division D: Manufacturing
    Major Group 20: Food And Kindred Products
    Major Group 21: Tobacco Products
    Major Group 22: Textile Mill Products
    Major Group 23: Apparel And Other Finished Products Made From Fabrics And Similar Materials
    Major Group 24: Lumber And Wood Products, Except Furniture
    Major Group 25: Furniture And Fixtures
    Major Group 26: Paper And Allied Products
    Major Group 27: Printing, Publishing, And Allied Industries
    Major Group 28: Chemicals And Allied Products
    Major Group 29: Petroleum Refining And Related Industries
    Major Group 30: Rubber And Miscellaneous Plastics Products
    Major Group 31: Leather And Leather Products
    Major Group 32: Stone, Clay, Glass, And Concrete Products
    Major Group 33: Primary Metal Industries
    Major Group 34: Fabricated Metal Products, Except Machinery And Transportation Equipment
    Major Group 35: Industrial And Commercial Machinery And Computer Equipment
    Major Group 36: Electronic And Other Electrical Equipment And Components, Except Computer Equipment
    Major Group 37: Transportation Equipment
    Major Group 38: Measuring, Analyzing, And Controlling Instruments; Photographic, Medical And Optical Goods; Watches And Clocks
    Major Group 39: Miscellaneous Manufacturing Industries

E.  Division E: Transportation, Communications, Electric, Gas, And Sanitary Services
    Major Group 40: Railroad Transportation
    Major Group 41: Local And Suburban Transit And Interurban Highway Passenger Transportation
    Major Group 42: Motor Freight Transportation And Warehousing
    Major Group 43: United States Postal Service
    Major Group 44: Water Transportation
    Major Group 45: Transportation By Air
    Major Group 46: Pipelines, Except Natural Gas
    Major Group 47: Transportation Services
    Major Group 48: Communications
    Major Group 49: Electric, Gas, And Sanitary Services

F.  Division F: Wholesale Trade
    Major Group 50: Wholesale Trade-durable Goods
    Major Group 51: Wholesale Trade-non-durable Goods

G.  Division G: Retail Trade
    Major Group 52: Building Materials, Hardware, Garden Supply, And Mobile Home Dealers
    Major Group 53: General Merchandise Stores
    Major Group 54: Food Stores
    Major Group 55: Automotive Dealers And Gasoline Service Stations
    Major Group 56: Apparel And Accessory Stores
    Major Group 57: Home Furniture, Furnishings, And Equipment Stores
    Major Group 58: Eating And Drinking Places
    Major Group 59: Miscellaneous Retail

H.  Division H: Finance, Insurance, And Real Estate
    Major Group 60: Depository Institutions
    Major Group 61: Non-depository Credit Institutions
    Major Group 62: Security And Commodity Brokers, Dealers, Exchanges, And Services
    Major Group 63: Insurance Carriers
    Major Group 64: Insurance Agents, Brokers, And Service
    Major Group 65: Real Estate
    Major Group 67: Holding And Other Investment Offices

I.  Division I: Services
    Major Group 70: Hotels, Rooming Houses, Camps, And Other Lodging Places
    Major Group 72: Personal Services
    Major Group 73: Business Services
    Major Group 75: Automotive Repair, Services, And Parking
    Major Group 76: Miscellaneous Repair Services
    Major Group 78: Motion Pictures
    Major Group 79: Amusement And Recreation Services
    Major Group 80: Health Services
    Major Group 81: Legal Services
    Major Group 82: Educational Services
    Major Group 83: Social Services
    Major Group 84: Museums, Art Galleries, And Botanical And Zoological Gardens
    Major Group 86: Membership Organizations
    Major Group 87: Engineering, Accounting, Research, Management, And Related Services
    Major Group 88: Private Households
    Major Group 89: Miscellaneous Services

J.  Division J: Public Administration
    Major Group 91: Executive, Legislative, And General Government, Except Finance
    Major Group 92: Justice, Public Order, And Safety
    Major Group 93: Public Finance, Taxation, And Monetary Policy
    Major Group 94: Administration Of Human Resource Programs
    Major Group 95: Administration Of Environmental Quality And Housing Programs
    Major Group 96: Administration Of Economic Programs
    Major Group 97: National Security And International Affairs
    Major Group 99: Nonclassifiable Establishments
*/
