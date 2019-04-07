centos:
- curl -s https://packagecloud.io/install/repositories/Altinity/clickhouse/script.rpm.sh | sudo bash
- yum install -y clickhouse-server clickhouse-client
- /etc/clickhouse-server/config.xml: <tcp_port>9000</tcp_port> -> <tcp_port>9123</tcp_port>
- service clickhouse-server restart
- http://127.0.0.1:8123/

- interfaces:
    - https://github.com/vrana/adminer
    - https://github.com/tabixio/tabix
    - https://github.com/dbeaver/dbeaver
    - https://grafana.com/plugins/vertamedia-clickhouse-datasource
    - idea datagrip
    