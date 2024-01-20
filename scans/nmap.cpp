#include<iostream>
#include<string>
#include<cstdlib>
#include<memory>
#include<cstdio>
#include<stdexcept>
#include<array>

std::string exec(const char* cmd) {
  std::array<char, 128> buffer;
  std::string result;

  std::unique_ptr<FILE, decltype(&pclose)> pipe (popen(cmd, "r"), pclose);
  if (!pipe) {
    throw std::runtime_error("exec failed!");
  }
  while (fgets(buffer.data(), buffer.size(), pipe.get()) != nullptr) {
    result += buffer.data();
  }

  return result;
}

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


