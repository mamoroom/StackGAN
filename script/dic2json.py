import json
import sys
import ast
import yaml
import pprint


#print(type(yaml.load(sys.argv[1])))
#pprint.pprint(yaml.load(sys.argv[1]))
print(json.dumps(yaml.load(sys.argv[1])))
