#include<iostream>
#include<string>
#include "../include/exec.h"

int nmapScan(const std::string& ip, const std::string& args) {
  std::string scan = "nmap "; 
  std::string cmd = scan + args + " " + ip;
  std::string result = exec(cmd.c_str());

  std::cout << "Scan result: \n" << result << std::endl;

  return 0;
}

int main(int argc, char* argv[]) {
  if (argc != 3) {
    std::cerr << "Run: " << argv[0] << " <IP> <ARGS>\n" << std::endl;

    return 1;
  }

  std::string ip = argv[1];
  std::string args = argv[2];

  nmapScan(ip, args);

  return 0;
}


